<?php
//backend_web/src/Controller/Open/Home.php
declare(strict_types=1);
namespace App\Controller\Open;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    public function index()
    {
        return $this->render('open/home/index.html.twig');
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