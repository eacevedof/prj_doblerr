<?php
namespace App\Services;

use Psr\Log\LoggerInterface;

class FooService
{
    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
        //dump("fooservice.construct.logger");
        //dump("class_implements:",class_implements($logger));
        //dd($this->logger);
        //Symfony\Bridge\Monolog\Logger inyecta esto sin o con lazy
    }

    public function loginfo($info)
    {
        $this->logger->info($info);
    }
}