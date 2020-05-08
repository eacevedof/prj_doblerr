<?php
//backend_web/src/Controller/Open/Home.php
declare(strict_types=1);

namespace App\Controller\Open;
use App\Component\Serialize;
use Symfony\Component\HttpFoundation\Request;
use App\Controller\BaseController;
use App\Services\Common\ProductService;

class ProductController extends BaseController
{
    private ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function __invoke(Request $request)
    {
        //$products = $this->productService->get_list();
        $products = $this->productService->get_list_filter(["id"=>3]);
        $response = $this->get_response_json();
        $response->setContent(Serialize::get_jsonarray($products));
        return $response;
    }

}//ProductController
