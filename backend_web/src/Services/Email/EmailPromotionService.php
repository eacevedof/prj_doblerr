<?php
namespace App\Services\Email;
use App\Services\BaseService;
use App\Component\Mail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;

final class EmailPromotionService extends BaseService
{
    private const SUBSCRIBE = "subscribe";
    private const CONFIRM = "confirm-code";

    private MailerInterface $mailer;

    public function __construct(Request $request, MailerInterface $mailer)
    {
        parent::__construct($request);
        $this->mailer = $mailer;
    }

    private function _get_text_subscribe()
    {
        $message = "
            Cita:
        Cliente:  {$this->get_post("name")}
        Telf:  {$this->get_post("phone")}    
        Email:  {$this->get_post("email")} 
        Estilista:  {$this->get_post("person")} 
        Fecha:  {$this->get_post("datetime")}
        Servicios:  {$this->get_post("services")}
        ";
        return $message;
    }

    private function _get_text_confirm()
    {
        $str = $this->get_post("message");
        $str = substr($str,0,3000);
        $message = "
            Consulta:
        Cliente:  {$this->get_post("name")}
        Email:  {$this->get_post("email")} 
        Asunto:  {$this->get_post("subject")} 
        Mensaje:  {$str}
        ";
        return $message;
    }

    private function _subscribe()
    {
        $action = $this->get_post("action");
        if($action==self::SUBSCRIBE)
            $action = "Cita";
        $name = $this->get_post("name");
        $email = $this->get_post("email");

        $data = [
            "from" => $this->get_env("APP_EMAIL_FROM"),
            "to" => $email,
            "bcc" => [$this->get_env("APP_EMAIL_FROM"), $this->get_env("APP_EMAIL_TO")],
            "subject" => sprintf("doblerr noreply - %s de %s (%s) %s",$action,$name,$email,date("Ymd-His")),
            "text" => $this->_get_text_subscribe(),
        ];

        $this->logd($data,"mail.apointment");
        $mail = new Mail($data,$this->mailer);
        if($this->is_envprod())  $mail->send();
        //$mail->send();
    }

    private function _confirm()
    {
        $action = $this->get_post("action");
        if($action==self::CONFIRM)
            $action = "Confirmación";
        $name = $this->get_post("name");
        $email = $this->get_post("email");

        $data = [
            "from" => $this->get_env("APP_EMAIL_FROM"),
            "to" => $email,
            "bcc" => [$this->get_env("APP_EMAIL_FROM"), $this->get_env("APP_EMAIL_TO")],
            "subject" => sprintf("doblerr noreply - %s de %s (%s) %s",$action,$name,$email,date("Ymd-His")),
            "text" => $this->_get_text_confirm(),
        ];

        $this->logd($data,"mail.contact");
        $mail = new Mail($data,$this->mailer);
        if($this->is_envprod()) $mail->send();
        //$mail->send();
    }

    public function send()
    {
        $action = $this->get_post("action");
        $this->logd($action,"action");
        if($action==self::SUBSCRIBE) $this->_subscribe();
        if($action==self::CONFIRM) $this->_confirm();
    }

}//EmailPromotionService