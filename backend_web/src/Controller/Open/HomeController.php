<?php
//backend_web/src/Controller/Open/Home.php
declare(strict_types=1);
namespace App\Controller\Open;

use App\Providers\HomeProvider;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    private $provider;

    public function __construct()
    {
        $this->provider= new HomeProvider();
    }

    public function index()
    {
        $arslider = $this->provider->get_text_slider();
        $services = $this->provider->get_text_services();
        return $this->render('open/home/index.html.twig',["arslider"=>$arslider,"services"=>$services]);
    }

    public function about_us()
    {
        return $this->render('open/home/about-us.html.twig');
    }

    public function services()
    {
        $categories = $this->provider->get_categories();
        $services = $this->provider->get_text_services();
        $products = $this->provider->get_text_products();
        $services = array_merge($services,$products);
        return $this->render('open/home/services.html.twig',["categories"=>$categories,"services"=>$services]);
    }

    public function contact()
    {
        return $this->render('open/home/contact.html.twig');
    }

}