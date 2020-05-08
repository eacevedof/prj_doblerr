<?php
//backend_web/src/Controller/Open/Home.php
declare(strict_types=1);

namespace App\Controller\Open;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

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
        $response = new Response();
        $response->setContent(json_encode([
            'data' => 123,
        ]));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

}//ProductController
