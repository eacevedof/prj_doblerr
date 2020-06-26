<?php
namespace App\Services\Common;

use App\Services\BaseService;
use App\Repository\PromotionsSubscribersRepository;

class PromotionSubscribeService extends BaseService
{
    private PromotionsSubscribersRepository $promotionsSubscribesRepository;

    public function __construct(PromotionsSubscribersRepository $promotionsSubscribesRepository)
    {
        $this->promotionsSubscribesRepository = $promotionsSubscribesRepository;
    }

    public function get_list()
    {
        $products = $this->promotionsSubscribesRepository->findAll();
        //print_r($products);die;
        return $products;
    }

    public function get_list_filter(array $criteria=[])
    {
        $products = $this->promotionsSubscribesRepository->findBy($criteria,["id"=>"DESC"]);
        return $products;
    }

}