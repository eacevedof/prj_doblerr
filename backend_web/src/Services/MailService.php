<?php
declare(strict_types=1);

namespace App\Services;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class MailService
{
    private $mailer;
    private $data;

    public function __construct(MailerInterface $mailer,array $data)
    {
        $this->data = $data;
        $this->mailer = $mailer;
    }

    private function get_mail_object()
    {
        $email = new Email();
        $email->from($this->data["from"]);
    }

    public function send()
    {
        $email = (new Email())
            ->from('doblerr57c@gmail.com')
            ->to('eacevedof@gmail.com')
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject('Time for Symfony Mailer!')
            ->text('Sending emails is fun again!')
            ->html('<p>See Twig integration for better HTML integration!</p>');

        $this->mailer->send($email);

    }
}