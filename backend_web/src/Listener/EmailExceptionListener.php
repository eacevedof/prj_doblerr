<?php
namespace App\Listener;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

class EmailExceptionListener
{
    public function onKernelException(ExceptionEvent $event): void
    {
        dump("EmailExceptionResponseListener.onKernelException");
        $exception = $event->getThrowable();
        if ($exception instanceof HttpExceptionInterface) {
           dump("EmailExceptionResponseListener.onKernelException");
        }
    }
}