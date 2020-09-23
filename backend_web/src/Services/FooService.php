<?php
namespace App\Services;

use Psr\Log\LoggerInterface;

class FooService
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function loginfo($info)
    {
        $this->logger->info($info);
    }
}