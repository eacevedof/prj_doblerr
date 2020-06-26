<?php
//backend_web/src/Controller/Open/Home.php
declare(strict_types=1);

namespace App\Controller\Open;
use App\Component\Serialize;
use App\Providers\SeoProvider;
use App\Services\EmailService;
use Symfony\Component\HttpFoundation\Request;
use App\Controller\BaseController;
use App\Services\Common\ProductService;
use Symfony\Component\HttpFoundation\Response;

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
        return $this->render('open/promotion/forms/promo-0001.html.twig',[
            "seo"=>$seo,
            "error"=>null,
            "options"=>[
                ["value"=>"","text"=>""],
            ],
        ]);
    }

    public function subscribe(Request $request)
    {
        $this->logd($_POST,"mail.post");
        $this->logd($_SERVER["REMOTE_ADDR"],"ip from");
        try{
            $mail = new EmailService($this->get_request(),$mailer);
            $mail->send();
        }
        catch(\Exception $e){
            $this->logd($e->getMessage(),"mail.error");
            return (new Response('Content',
                Response::HTTP_BAD_REQUEST,
                ['content-type' => 'application/json']))->setContent(json_encode(
                [
                    "title" => "error",
                    "description"=>$e->getMessage()
                ]
            ));
        }

        return (new Response('Content',
            Response::HTTP_OK,
            ['content-type' => 'application/json']))->setContent(json_encode(
            [
                "title" => "success",
                "description"=>"Email has benn sent"
            ]
        ));
    }

}//PromotionController
