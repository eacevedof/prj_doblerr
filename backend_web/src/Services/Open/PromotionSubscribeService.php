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

use Symfony\Component\HttpFoundation\Response;

class PromotionSubscribeService extends BaseService
{
    private PromotionsSubscribersRepository $promotionsSubscribesRepository;
    private PromotionRepository $promotionRepository;
    private PromotionUserRepository $promotionUserRepository;

    private AppPromotion $appPromotion;
    private AppPromotionsSusbscribers $appPromotionsSusbscribers;
    private AppPromotionUser $appPromotionUser;

    private ?string $slug;

    public function __construct(
        PromotionsSubscribersRepository $promotionsSubscribesRepository,
        PromotionRepository $promotionRepository,
        PromotionUserRepository $promotionUserRepository,
        RequestStack $requestStack
    )
    {
        $this->promotionsSubscribesRepository = $promotionsSubscribesRepository;
        $this->promotionRepository = $promotionRepository;
        $this->promotionUserRepository = $promotionUserRepository;
        //$this->appPromotion = $appPromotion;
        //$this->appPromotionsSusbscribers = $appPromotionsSusbscribers;
        //$this->appPromotionUser = $appPromotionUser;
        $this->requestStack = $requestStack;
        //dump($this->requestStack);die;
    }

    private function _get_post($key){
        return $this->requestStack->getCurrentRequest()->get($key);
    }

    private function _get_get($key){
        return $this->requestStack->getCurrentRequest()->query->get($key);
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
            throw new \Exception("La promoción fuera de fecha.",Response::HTTP_BAD_REQUEST);
    }

    private function _is_ip()
    {}

    private function _validate()
    {
        //$this->_is_slug();
        //$this->_is_promotion();
        $this->_is_indate();
        $this->_is_ip();
    }

    public function subscribe(?string $slug)
    {
        $this->slug = $slug;
        $this->_validate();
    }

}