<?php
//backend_web/src/Controller/Open/Home.php
declare(strict_types=1);
namespace App\Controller\Open;

use App\Providers\HomeProvider;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    public function index()
    {
        $provider = new HomeProvider();
        $arslider = $provider->get_text_slider();
        $services = $provider->get_text_services();
        return $this->render('open/home/index.html.twig',["arslider"=>$arslider,"services"=>$services]);
    }

    public function about_us()
    {
        return $this->render('open/home/about-us.html.twig');
    }

    public function services()
    {
        return $this->render('open/home/services.html.twig');
    }

    public function contact()
    {
        return $this->render('open/home/contact.html.twig');
    }

}