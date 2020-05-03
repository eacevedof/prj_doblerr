<?php
declare(strict_types=1);
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

class BaseController extends AbstractController
{
    private $request;

    public function __construct(RequestStack $request)
    {
        $this->request =$request->getCurrentRequest();
    }

    protected function get_env($key)
    {
        return $_ENV[$key] ?? "";
    }

    protected function get_post($key)
    {
        return $this->request->request->get($key) ?? null;
    }
    protected function get_get($key)
    {
        return $this->request->query->get($key) ?? null;
    }
}