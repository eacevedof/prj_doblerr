<?php
namespace App\Services;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
class BaseService
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request =$request;
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