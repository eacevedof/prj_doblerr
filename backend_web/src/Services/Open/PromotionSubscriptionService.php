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

class PromotionSubscriptionService extends BaseService
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
        //dump($this->requestStack);die;
    }

    private function _get_post($key){
        return $this->requestStack->getCurrentRequest()->get($key);
    }

    private function _get_get($key){
        return $this->requestStack->getCurrentRequest()->query->get($key);
    }

    private function _get_promotion(): ?AppPromotion
    {
        $r = $this->promotionRepository->findBySlug($this->slug);
        return $r[0] ?? null;
    }

    private function _get_saved_promouser(): AppPromotionUser
    {
        $name1 = $this->_get_post("name");
        $email = $this->_get_post("email");
        $phone1 = $this->_get_post("phone");

        /*
        $promouser = new AppPromotionUser();
        $promouser->setName1($name1);
        $promouser->setEmail($email);
        $promouser->setPhone1($phone1);
        */

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

    private function _is_subscribed()
    {
        //comprueba si tiene una suscripción pendiente de consumir
        $r = $this->promotionUserRepository->findBy(["email"=>$this->_get_post("email")]);
        if(!$r) return;

        $oPromouser = $r[0];
        if(!$oPromouser->getId()) return;

        $r = $this->promotionRepository->findBySlug($this->slug);
        if(!$r) return;

        $oPromotion = $r[0];
        if(!$oPromotion->getId()) return;

        //print_r($oPromouser);die;
        //var_dump($oPromotion);die;
        $idpromo = $oPromotion->getId();
        $idpromouser = $oPromouser->getId();

        $r = $this->promotionsSubscribersRepository->findByPromoUser($idpromo,$idpromouser);
        if(!$r) return;

        $oPromoSubscription = $r[0];
        if(!$oPromoSubscription->getId()) return;
        
        if(!$oPromoSubscription->getIsConfirmed())
            throw new \Exception("Tienes una subscripción pendiente de confirmar. Revisa tu email: {$oPromouser->getEmail()}",Response::HTTP_BAD_REQUEST);

        if(!$oPromoSubscription->getDateExec())
            throw new \Exception("Solo te puedes subscribir una vez",Response::HTTP_BAD_REQUEST);
    }

    private function _is_post()
    {
        $name1 = $this->_get_post("name");
        if(!trim($name1))
            throw new \Exception("No se ha proporcionado el nombre",Response::HTTP_BAD_REQUEST);

        $email = $this->_get_post("email");
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            throw new \Exception("Email incorrecto",Response::HTTP_BAD_REQUEST);

        $phone1 = $this->_get_post("phone");
        if(!trim($phone1))
            throw new \Exception("No se ha proporcionado un teléfono",Response::HTTP_BAD_REQUEST);
    }

    private function _is_slug()
    {
        if(!$this->slug)
            throw new \Exception("No se ha seleccionado una promoción",Response::HTTP_BAD_REQUEST);
    }

    private function _is_promotion()
    {
        $promotion = $this->promotionRepository->findBySlug($this->slug);
        if(!$promotion)
            throw new \Exception("No se ha encontrado esta promoción",Response::HTTP_NOT_FOUND);
    }

    private function _is_indate()
    {
        $promotion = $this->promotionRepository->findByDate($this->slug);
        if(!$promotion)
            throw new \Exception("La promoción esta fuera de fecha.",Response::HTTP_BAD_REQUEST);
    }

    private function _is_ip()
    {}

    private function _validate_with_exceptions()
    {
        $this->_is_slug();
        $this->_is_post();
        $this->_is_promotion();
        $this->_is_indate();
        $this->_is_subscribed();
        $this->_is_ip();
    }

    public function subscribe(?string $slug)
    {
        $this->slug = $slug;
        $this->_validate_with_exceptions();

        $promotion = $this->_get_promotion();
        $promouser = $this->_get_saved_promouser();

        $promosubscription = new AppPromotionsSusbscribers();
        $promosubscription->setIdPromotion($promotion->getId());
        $promosubscription->setIdPromouser($promouser->getId());
        $this->promotionsSubscribersRepository->save($promosubscription);
        $code = $this->encDecrypt->get_rnd_word(5);
        $finalcode = "{$promosubscription->getId()}-$code";
        $this->logd($finalcode,"finalcode");
        $promosubscription->setCode1($finalcode);
        $this->promotionsSubscribersRepository->save($promosubscription);
    }
}