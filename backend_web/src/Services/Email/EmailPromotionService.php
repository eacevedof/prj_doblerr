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
        $oPromotion = $this->objects["promotion"];
        $oUser = $this->objects["user"];
        $oSubscription = $this->objects["subscription"];

        $message = "
        <h3>Promoción: {$oPromotion->getDescription()}</h3>
        <p>
        Con cualquier trabajo técnico o modelado el tratamiento Botox capilar es gratis.
        </p>
        <p>
        Hola %s. Gracias por confirmar tu suscripción. <br /> 
        Ya tienes la promoción \"<b>%s</b>\".<br/> 
        </p>
        
        <br/>
        <b>Recuerda:</b>
        <ul>
            <li>Hacerla efectiva antes del día: <b>%s</b></li>
            <li>Llamar antes para poder concretar una cita.</li>
            <li>El consumo de la promoción solo es válido entre los días: Lunes y Miercoles de 14:00 a 19:00</li>
            <li>Esta promoción cuenta como un punto. A los diez recibirás un email con un servicio de regalo.</li>
            <li>Proporciona tu código:<b>%s</b> después de hacer efectiva la promoción. Así lo podremos contabilizar para el regalo.</li>
            <li>La contabilización de puntos se realiza por email. Procura suscribirte a cualquier promoción siempre con el mismo correo electrónico</li>
        </ul>
        ";

        return sprintf($message,
            $oUser->getName1(),$oPromotion->getDescription(),$oPromotion->getDateTo()->format("Y-m-d"),$oSubscription->getCode1()
        );
    }

    private function _subscribe()
    {
        $oUser = $this->objects["user"];

        $action = "Código suscripción";
        $name = $oUser->getName1();
        $email = $oUser->getEmail();

        $data = [
            "from" => $this->get_env("APP_EMAIL_FROM"),
            "to" => $email,
            //"bcc" => [$this->get_env("APP_EMAIL_FROM"), $this->get_env("APP_EMAIL_TO")],
            "subject" => sprintf("doblerr noreply - %s de %s (%s) %s",$action,$name,$email,date("Ymd-His")),
            "text" => "",//esta clave siempre tiene que ir sino no se envia
            "html" => $this->_get_text_subscribe(),
        ];

        $this->logd($data,"mail.promotion._subscribe");
        $mail = new Mail($data,$this->mailer);
        if($this->is_envprod())  $mail->send();
    }

    private function _confirm()
    {
        $oUser = $this->objects["user"];

        $action = "Suscripción realizada";
        $name = $oUser->getName1();
        $email = $oUser->getEmail();

        $data = [
            "from" => $this->get_env("APP_EMAIL_FROM"),
            "to" => $email,
            //"bcc" => [$this->get_env("APP_EMAIL_FROM"), $this->get_env("APP_EMAIL_TO")],
            "subject" => sprintf("doblerr noreply - %s de %s (%s) %s",$action,$name,$email,date("Ymd-His")),
            "text" => "",//esta clave siempre tiene que ir sino no se envia
            "html" => $this->_get_text_confirm(),
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