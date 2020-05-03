<?php
namespace App\Services;
use App\Component\Mail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;

final class EmailService extends BaseService
{
    private MailerInterface $mailer;

    public function __construct(Request $request, MailerInterface $mailer)
    {
        parent::__construct($request);
        $this->mailer = $mailer;
    }

    public function send()
    {
        $action = "cita";
        $name = $this->get_post("name") ?? "aaa";
        $emailto = $this->get_post("mail-to") ?? "eacevedof@gmail.com";

        $message = $this->get_post("message") ?? " message ";
        $data = [
            "from" => $this->get_env("APP_EMAIL_FROM"),
            "to" => $emailto,
            "bcc" => [$this->get_env("APP_EMAIL_FROM"), $this->get_env("APP_EMAIL_TO")],
            "subject" => sprintf("doblerr.es - %s de %s (%s) %s",$action,$name,$emailto,date("Ymd-His")),
            "text" => $message,
        ];
        $mail = new Mail($data,$this->mailer);
        $mail->send();
    }

}