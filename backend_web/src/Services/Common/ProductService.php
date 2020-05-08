<?php
namespace App\Services\Common;

use App\Services\BaseService;
use App\Repository\ProductRepository;
use App\Component\Serialize;

class ProductService extends BaseService
{
    private ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function get_list()
    {
        $products = $this->productRepository->findAll();
        return $products;
    }

}