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
    private $objects = [];

    public function __construct(Request $request, MailerInterface $mailer)
    {
        parent::__construct($request);
        $this->mailer = $mailer;
    }

    private function _get_text_subscribe()
    {
        $domain = "http://localhost";
        if($this->is_envprod()) $domain = "https://doblerr.es";

        $oPromotion = $this->objects["promotion"];
        $oUser = $this->objects["user"];
        $oSubscription = $this->objects["subscription"];

        $message = "
        Hola %s. Solo te queda este paso. 
        Tu código de confirmación es: <b>%s</b>
        Finaliza el proceso de suscripción ingresandolo <a href='{$domain}/promocion/confirm-form/%s' target='_blank'>aquí</a>
        ";

        return sprintf($message,$oUser->getName1(),$oSubscription->getCode1(),$oPromotion->getSlug());
    }

    private function _get_text_confirm()
    {
        $domain = "http://localhost";
        if($this->is_envprod()) $domain = "https://doblerr.es";

        $oPromotion = $this->objects["promotion"];
        $oUser = $this->objects["user"];
        $oSubscription = $this->objects["subscription"];

        $message = "
        Hola %s. Gracias por confirmar tu suscripción. Ya tienes la promoción %s. 
        Recuerda consumirla antes de %s  
        
        ";

        return sprintf($message,$oUser->getName1(),$oSubscription->getCode1(),$oPromotion->getSlug());
    }

    private function _subscribe()
    {
        $oPromotion = $this->objects["promotion"];
        $oUser = $this->objects["user"];
        //$oSubscription = $this->arobjs["subscription"];

        $action = "Código suscripción";
        $name = $oUser->getName1();
        $email = $oUser->getEmail();

        $data = [
            "from" => $this->get_env("APP_EMAIL_FROM"),
            "to" => $email,
            "bcc" => [$this->get_env("APP_EMAIL_FROM"), $this->get_env("APP_EMAIL_TO")],
            "subject" => sprintf("doblerr noreply - %s de %s (%s) %s",$action,$name,$email,date("Ymd-His")),
            "text" => $this->_get_text_subscribe(),
        ];

        $this->logd($data,"mail.promotion._subscribe");
        $mail = new Mail($data,$this->mailer);
        if($this->is_envprod())  $mail->send();
    }

    private function _confirm()
    {
        $oPromotion = $this->objects["promotion"];
        $oUser = $this->objects["user"];
        //$oSubscription = $this->arobjs["subscription"];

        $action = "Suscripción realizada";
        $name = $oUser->getName1();
        $email = $oUser->getEmail();

        $data = [
            "from" => $this->get_env("APP_EMAIL_FROM"),
            "to" => $email,
            "bcc" => [$this->get_env("APP_EMAIL_FROM"), $this->get_env("APP_EMAIL_TO")],
            "subject" => sprintf("doblerr noreply - %s de %s (%s) %s",$action,$name,$email,date("Ymd-His")),
            "text" => $this->_get_text_confirm(),
        ];

        $this->logd($data,"mail.promotion._confirm");
        $mail = new Mail($data,$this->mailer);
        if($this->is_envprod()) $mail->send();
    }

    public function send()
    {
        $action = $this->get_post("action");
        $this->logd($action,"emailpromotionservice.action");
        if($action==self::SUBSCRIBE) $this->_subscribe();
        if($action==self::CONFIRM) $this->_confirm();
    }

    public function set_objects($arobjs){$this->objects = $arobjs;}

}//EmailPromotionService