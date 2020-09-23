<?php
namespace App\Services;

use Psr\Log\LoggerInterface;

class FooService
{
    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
        dump("fooservice.construct.logger");
        dd($this->logger);
        //Symfony\Bridge\Monolog\Logger inyecta esto sin lazy
    }

    public function loginfo($info)
    {
        $this->logger->info($info);
    }
}