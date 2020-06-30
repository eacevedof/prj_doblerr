<?php
//backend_web/src/Controller/Open/Home.php
declare(strict_types=1);

namespace App\Controller\Open;
use App\Component\Serialize;
use App\Providers\SeoProvider;
use App\Services\Email\EmailFormService;
use App\Services\Email\EmailPromotionService;
use App\Services\Open\PromotionConfirmService;
use Symfony\Component\HttpFoundation\Request;
use App\Controller\BaseController;
use App\Services\Open\PromotionSubscriptionService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;

class PromotionController extends BaseController
{

    //<domain>/promocion/<some-slug>
    public function __invoke(string $slug)
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

    //<domain>/promocion/subscribe/{slug}
    public function subscribe(
        PromotionSubscriptionService $promotionSubscriptionService,
        MailerInterface $mailer,
        string $promoslug)
    {
        try{
            $promotionSubscriptionService->subscribe($promoslug);
            $mail = new EmailPromotionService($this->get_request(),$mailer);
            $mail->set_objs($promotionSubscriptionService->get_subscribed_objs());
            $mail->send();
        }
        catch(\Exception $e){
            $this->logd($e->getMessage(),"promotion.subscribe.error");
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
                "description"=>"
                    Te hemos enviado un código de confirmación por favor insertalo para finalizar tu subscripcioón.
                    
                "
            ]
        ));
    }// subscribe

    //<domain>/promocion/confirm/{slug}
    public function confirm(
        PromotionConfirmService $promotionConfirmService,
        MailerInterface $mailer,
        string $promoslug
    )
    {
        try{
            $promotionConfirmService->confirm($promoslug);
            $mail = new EmailPromotionService($this->get_request(),$mailer);
            $mail->set_objs($promotionConfirmService->get_subscribed_objs());
            $mail->send();
        }
        catch(\Exception $e){
            $this->logd($e->getMessage(),"promotion.confirm.error");
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
                "description"=>"Gracias por haber confirmado tu suscripción. Hazla efectiva antes de que caduque."
            ]
        ));
    }// confirm

    //<domain>/promocion/confirm-form/{slug}
    public function confirm_form(PromotionConfirmService $promotionConfirmService, string $promoslug)
    {
        $seo = SeoProvider::get_meta("promotion");
        return $this->render('open/promotion/forms/confirm.html.twig',[
            "seo"=>$seo,
            "error"=>null,
            "options"=>[
                ["value"=>"","text"=>""],
            ],
        ]);
    }// confirm_form

}//PromotionController
