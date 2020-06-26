<?php
//backend_web/src/Controller/Open/Home.php
declare(strict_types=1);

namespace App\Controller\Open;
use App\Component\Serialize;
use App\Providers\SeoProvider;
use Symfony\Component\HttpFoundation\Request;
use App\Controller\BaseController;
use App\Services\Common\ProductService;

class PromotionController extends BaseController
{
    private ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    //<domain>/promotion/<some-slug>
    public function __invoke(Request $request, string $slug)
    {
        $seo = SeoProvider::get_meta("promotion");
        return $this->render('open/promotion/forms/promo-0001.html.twig',["seo"=>$seo,"error"=>null]);
    }

}//PromotionController
