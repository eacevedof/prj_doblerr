<?php
//backend_web/src/Controller/Open/Home.php
declare(strict_types=1);
namespace App\Controller\Open;

use App\Controller\BaseController;
use App\Providers\HomeProvider;
use App\Component\Mail;
use App\Providers\SeoProvider;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;

class HomeController extends BaseController
{

    public function __construct(RequestStack $request)
    {
        parent::__construct($request);
        $this->provider= new HomeProvider();
    }

    public function index()
    {
        $seo = SeoProvider::get_meta("home");
        $arslider = $this->provider->get_text_slider();
        $services = $this->provider->get_text_services();
        return $this->render('open/home/index.html.twig',["arslider"=>$arslider,"services"=>$services,"seo"=>$seo]);
    }

    public function about_us()
    {
        $seo = SeoProvider::get_meta("about-us");
        return $this->render('open/home/about-us.html.twig',["seo"=>$seo]);
    }

    public function services()
    {
        $seo = SeoProvider::get_meta("services");
        $categories = $this->provider->get_categories();
        $services = $this->provider->get_text_services();
        $products = $this->provider->get_text_products();
        $services = array_merge($services,$products);
        return $this->render('open/home/services.html.twig',["categories"=>$categories,"services"=>$services,"seo"=>$seo]);
    }

    public function contact()
    {
        $seo = SeoProvider::get_meta("contact");
        return $this->render('open/home/contact.html.twig',["seo"=>$seo]);
    }

    public function mail(MailerInterface $mailer)
    {
        $action = "cita";
        $name = $this->get_post("name") ?? "aaa";
        $emailto = $this->get_post("mail-to") ?? "eacevedofgmail.com";

        $message = $this->get_post("message") ?? " message ";
        $data = [
            "from" => $this->get_env("APP_EMAIL_FROM"),
            "to" => $emailto,
            "bcc" => [$this->get_env("APP_EMAIL_FROM"), $this->get_env("APP_EMAIL_TO")],
            "subject" => sprintf("doblerr.es - %s de (%s) %s %s",$action,$name,$emailto,date("Ymd-His")),
            "text" => $message,
        ];
        //dump($data);die;
        try{
            $mail = new Mail($mailer,$data);
            $mail->send();
        }
        catch(\Exception $e){
            die($e->getMessage());
        }


        return (new Response('Content',
            Response::HTTP_OK,
            ['content-type' => 'application/json']))->setContent(json_encode($data));
    }
}