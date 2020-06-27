<?php
namespace App\Services\Open;

use App\Services\BaseService;
use App\Repository\PromotionsSubscribersRepository;
use Symfony\Component\HttpFoundation\RequestStack;
use App\Repository\PromotionRepository;
use App\Repository\PromotionUserRepository;

use App\Entity\App\AppPromotion;
use App\Entity\App\AppPromotionsSusbscribers;
use App\Entity\App\AppPromotionUser;

class PromotionSubscribeService extends BaseService
{
    private PromotionsSubscribersRepository $promotionsSubscribesRepository;
    private PromotionRepository $promotionRepository;
    private PromotionUserRepository $promotionUserRepository;
    private AppPromotion $appPromotion;
    private AppPromotionsSusbscribers $appPromotionsSusbscribers;
    private AppPromotionUser $appPromotionUser;

    public function __construct(
        PromotionsSubscribersRepository $promotionsSubscribesRepository,
        PromotionRepository $promotionRepository,
        PromotionUserRepository $promotionUserRepository,
        AppPromotion $appPromotion
    )
    {

    }

/*
    public function __construct(
        PromotionsSubscribersRepository $promotionsSubscribesRepository,
        PromotionRepository $promotionRepository,
        PromotionUserRepository $promotionUserRepository,
        AppPromotion $appPromotion,
        AppPromotionsSusbscribers $appPromotionsSusbscribers,
        AppPromotionUser $appPromotionUser,
        RequestStack $requestStack
    )
    {
        $this->promotionsSubscribesRepository = $promotionsSubscribesRepository;
        $this->promotionRepository = $promotionRepository;
        $this->promotionUserRepository = $promotionUserRepository;
        //$this->appPromotion = $appPromotion;
        $this->appPromotionsSusbscribers = $appPromotionsSusbscribers;
        $this->appPromotionUser = $appPromotionUser;
        $this->requestStack = $requestStack;
    }
*/

    private function _get_post($key){
        return $this->requestStack->getCurrentRequest()->get($key);
    }

    private function _get_get($key){
        return $this->requestStack->getCurrentRequest()->query->get($key);
    }

    private function _is_promotion()
    {
        $promoslug = $this->_get_get("promoslug");
        $promotion = $this->promotionRepository->findBySlug($promoslug);
        dump($promotion);die;
    }

    private function _is_indate()
    {}

    private function _is_ip()
    {}

    private function _validate()
    {
        $this->_is_promotion();
        $this->_is_indate();
        $this->_is_ip();
    }

    public function subscribe()
    {
        $this->_validate();
    }

}