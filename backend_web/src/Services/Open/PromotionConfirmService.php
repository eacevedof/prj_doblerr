<?php
namespace App\Services\Open;

use App\Services\BaseService;
use App\Component\Encdecrypt;
use App\Repository\PromotionsSubscribersRepository;
use Symfony\Component\HttpFoundation\RequestStack;
use App\Repository\PromotionRepository;
use App\Repository\PromotionUserRepository;

use App\Entity\App\AppPromotion;
use App\Entity\App\AppPromotionsSusbscribers;
use App\Entity\App\AppPromotionUser;

use Symfony\Component\HttpFoundation\Response;

class PromotionConfirmService extends BaseService
{
    private PromotionsSubscribersRepository $promotionsSubscribersRepository;
    private PromotionRepository $promotionRepository;
    private PromotionUserRepository $promotionUserRepository;

    private Encdecrypt $encDecrypt;
    private ?string $slug;
    private ?string $codeconfirm;

    private $objects;

    public function __construct(
        PromotionsSubscribersRepository $promotionsSubscribersRepository,
        PromotionRepository $promotionRepository,
        PromotionUserRepository $promotionUserRepository,
        RequestStack $requestStack
    )
    {
        $this->promotionsSubscribersRepository = $promotionsSubscribersRepository;
        $this->promotionRepository = $promotionRepository;
        $this->promotionUserRepository = $promotionUserRepository;
        $this->requestStack = $requestStack;
        $this->encDecrypt = new Encdecrypt();
        $this->codeconfirm = trim($this->_get_post("codeconfirm"));
    }

    private function _get_post($key){
        return $this->requestStack->getCurrentRequest()->get($key);
    }

    private function _get_subscription():?AppPromotionsSusbscribers
    {
        $subscription = $this->promotionsSubscribersRepository->findByCode1($this->codeconfirm);
        return $subscription;
    }

    private function _get_promotion(): ?AppPromotion
    {
        $entity = $this->promotionRepository->findBySlug($this->slug);
        return $entity;
    }

    private function _get_promouser($iduser): AppPromotionUser
    {
        return $this->promotionUserRepository->findOneById($iduser);
    }

    private function _is_slug()
    {
        if(!$this->slug)
            throw new \Exception("No se ha seleccionado una promoción",Response::HTTP_BAD_REQUEST);
    }

    private function _is_post()
    {
        $action = $this->_get_post("action");
        if($action!=="confirm-code")
            throw new \Exception("No se ha podido identificar la acción {$action}",Response::HTTP_BAD_REQUEST);

        $codeconfirm = $this->codeconfirm;
        if(!trim($codeconfirm))
            throw new \Exception("No se ha proporcionado el código de confirmación",Response::HTTP_BAD_REQUEST);

        if(!is_numeric(substr($codeconfirm, 0, 1)))
            throw new \Exception("Formato de código de confirmación incorrecto.",Response::HTTP_BAD_REQUEST);

        //comprobar si el ultimo caracter es un caracter
        //if(!is_numeric(substr($codeconfirm, 0, 1)))
            //throw new \Exception("Formato de código de confirmación incorrecto.",Response::HTTP_BAD_REQUEST);
    }

    private function _is_promotion()
    {
        $promotion = $this->promotionRepository->findBySlug($this->slug);
        if(!$promotion)
            throw new \Exception("No se ha encontrado esta promoción",Response::HTTP_NOT_FOUND);
    }

    private function _is_promotion_indate()
    {
        $promotion = $this->promotionRepository->findByDate($this->slug);
        if(!$promotion)
            throw new \Exception("La promoción esta fuera de fecha.",Response::HTTP_BAD_REQUEST);
    }

    private function _is_subscription()
    {
        $subscription = $this->promotionsSubscribersRepository->findByCode1($this->codeconfirm);
        if(!($subscription && $subscription->getId()))
            throw new \Exception("No se ha encontrado esta subscripción.",Response::HTTP_NOT_FOUND);
    }

    private function _is_not_confirmed()
    {
        $codeconfirm = $this->_get_post("codeconfirm");
        $subscription = $this->promotionsSubscribersRepository->findByCode1($codeconfirm);
        if($subscription->getIsConfirmed())
            throw new \Exception("Esta subscripción ya estaba confirmada",Response::HTTP_BAD_REQUEST);
    }

    private function _is_ip(){}

    private function _validate_with_exceptions()
    {
        $this->_is_slug();
        $this->_is_post();
        $this->_is_promotion();
        $this->_is_promotion_indate();
        $this->_is_subscription();
        $this->_is_not_confirmed();
        $this->_is_ip();
    }

    public function confirm(?string $slug)
    {
        $this->slug = $slug;
        $this->logd($slug,"confirm.slug");
        $this->logd($this->codeconfirm,"confirm.code");
        $this->_validate_with_exceptions();
        $subscription = $this->_get_subscription();
        $subscription->setIsConfirmed(1);
        $subscription->setDateSubs(new \DateTime());
        $this->promotionsSubscribersRepository->save($subscription);

        $this->objects["promotion"] = $this->_get_promotion();
        $this->objects["user"] = $this->_get_promouser($subscription->getIdPromouser());
        $this->objects["subscription"] = $subscription;
    }

    public function get_subscribed_objs(){return $this->objects;}

}//PromotionConfirmService