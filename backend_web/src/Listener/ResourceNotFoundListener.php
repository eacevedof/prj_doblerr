<?php
declare(strict_types=1);

namespace App\Listener;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

class ResourceNotFoundListener
{
    public function onKernelException(ExceptionEvent $event): void
    {
        print_r("ResourceNotFoundListener.onKernelException");
    }
}