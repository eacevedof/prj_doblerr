<?php
namespace App\Twig;

use App\Services\Common\InfrastructureService;
use Doctrine\ORM\EntityManagerInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class AppExtension extends AbstractExtension
{
    private $em;

    public function __construct(EntityManagerInterface $em){
        $this->em = $em;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('is_prod', [$this, 'is_prod']),
            new TwigFunction('is_promotion', [$this, 'is_promotion']),
            new TwigFunction("is_ipuntracked", [$this, 'is_ipuntracked'])
        ];
    }

    public function is_prod()
    {
        //getenv() en ionos no tira
        //$value = getenv("APP_ENV");
        $value = $_ENV["APP_ENV"] ?? "";
        //print_r("value-env:$value --fin");
        return $value==="prod";
    }

    public function is_promotion($subject)
    {
        $subjects = [
            "oferta-facebook-000002"
        ];
        return in_array($subject,$subjects);
    }

    public function is_ipuntracked()
    {
        return InfrastructureService::is_ipuntracked($this->em);
    }
}