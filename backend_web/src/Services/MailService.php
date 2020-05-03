<?php
declare(strict_types=1);

namespace App\Services;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mime\Address;

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
        $d = $this->data;
        $email = new Email();
        $email->from($d["from"]);
        $email->to($d["to"]);
        if(isset($d["bcc"])) $email->bcc($d["bcc"][0]);
        if(isset($d["cc"])) $email->cc($d["cc"]);
        if(isset($d["subject"])) $email->subject($d["subject"]);
        $email->text($d["text"]);
        if(isset($d["html"]))$email->html($d["html"]);
        return $email;
    }

    public function send()
    {
        /*
        $email = (new Email())
            ->from('xxx@gmail.com')
            ->to('yyy@gmail.com')
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject('Time for Symfony Mailer!')
            ->text('Sending emails is fun again!')
            ->html('<p>See Twig integration for better HTML integration!</p>');
        */
        $email = $this->get_mail_object();
        $this->mailer->send($email);
    }
}