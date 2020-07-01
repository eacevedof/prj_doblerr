<?php
namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class AppExtension extends AbstractExtension
{
    public function getFunctions(): array
    {
        return [
            new TwigFunction('is_prod', [$this, 'is_prod']),
        ];
    }

    public function is_prod()
    {
        //esto en ionos no tira
        $value = getenv("APP_ENV");
        print_r("value-env:$value --fin"); die;
        return $value==="prod";
    }
}