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
    }

    private function _get_post($key){
        return $this->requestStack->getCurrentRequest()->get($key);
    }

    private function _get_subscription():?AppPromotionsSusbscribers
    {
        $codeconfirm = $this->get_post("codeconfirm");
        $subscription = $this->promotionsSubscribersRepository->findByCode($codeconfirm);
    }

    private function _get_promotion(): ?AppPromotion
    {
        $r = $this->promotionRepository->findBySlug($this->slug);
        return $r[0] ?? null;
    }

    private function _get_saved_promouser(): AppPromotionUser
    {
        $name1 = $this->_get_post("codeconfirm");
        $email = $this->_get_post("email");
        $phone1 = $this->_get_post("phone");

        $r = $this->promotionUserRepository->findBy(["email"=>$email]);
        $promouser = $r[0] ?? null;
        if(!$promouser){
            $promouser = new AppPromotionUser();
            $promouser->setName1($name1);
            $promouser->setEmail($email);
            $promouser->setPhone1($phone1);
            $this->promotionUserRepository->save($promouser);
            return $promouser;
        }

        $promouser->setUpdateDate(new \DateTime());
        $promouser->setPhone1($phone1);
        $promouser->setName1($name1);
        $this->promotionUserRepository->save($promouser);
        return $promouser;
    }

    private function _is_slug()
    {
        if(!$this->slug)
            throw new \Exception("No se ha seleccionado una promoción",Response::HTTP_BAD_REQUEST);
    }

    private function _is_post()
    {
        $codeconfirm = $this->_get_post("codeconfirm");
        if(!trim($codeconfirm))
            throw new \Exception("No se ha proporcionado el código de confirmación",Response::HTTP_BAD_REQUEST);

        if(!strstr($codeconfirm,"-"))
            throw new \Exception("Formato de código de confirmación incorrecto.",Response::HTTP_BAD_REQUEST);
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
        $codeconfirm = $this->get_post("codeconfirm");
        $subscription = $this->promotionsSubscribersRepository->findByCode($codeconfirm);
        if(!$subscription->getId())
            throw new \Exception("No se ha encontrado esta subscripción.",Response::HTTP_NOT_FOUND);
    }

    private function _is_not_confirmed()
    {
        $codeconfirm = $this->get_post("codeconfirm");
        $subscription = $this->promotionsSubscribersRepository->findByCode($codeconfirm);
        if($subscription->getIsConfirmed())
            throw new \Exception("Ya has confirmado tu subscripción",Response::HTTP_BAD_REQUEST);
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

    private function _subscribe(?string $slug)
    {

        $promouser = $this->_get_saved_promouser();

        $promosubscription = new AppPromotionsSusbscribers();
        $promosubscription->setIdPromotion($promotion->getId());
        $promosubscription->setIdPromouser($promouser->getId());
        $this->promotionsSubscribersRepository->save($promosubscription);
        $promosubscription->setDateSubs(new \DateTime());
        $code = $this->encDecrypt->get_rnd_word(5);
        $finalcode = "{$promosubscription->getId()}-$code";
        $this->logd($finalcode,"finalcode");
        $promosubscription->setCode1($finalcode);
        $this->promotionsSubscribersRepository->save($promosubscription);
        //var_dump($promotion);die;
    }

    public function confirm(?string $slug)
    {
        $this->slug = $slug;


        $this->_validate_with_exceptions();
        $promotion = $this->_get_promotion();
        $this->logd($slug,"confirm.slug");
    }

}