<?php
declare(strict_types=1);

namespace App\Components;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class Mail
{
    private $mailer;
    private $data;

    public function __construct(MailerInterface $mailer,array $data)
    {
        $this->data = $data;
        $this->mailer = $mailer;
    }

    private function add_bcc($bcc,Email $email)
    {
        if(isset($bcc))
        {
            if(is_array($bcc))
                foreach ($bcc as $sbcc)
                    $email->addBcc($sbcc);
            else
                $email->bcc($bcc);
        }
    }

    private function get_mail_object()
    {
        $d = $this->data;
        $email = new Email();
        $email->from($d["from"]);
        $email->to($d["to"]);

        if(isset($d["cc"])) $this->add_bcc($d["cc"],$email);
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