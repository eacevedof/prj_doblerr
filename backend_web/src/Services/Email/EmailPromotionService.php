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
        <p>
        Hola <b>{$oUser->getName1()}.</b><br/> 
        Nos falta validar tu suscripción. <br/>
        Tu código de confirmación para <b>{$oPromotion->getId()} - {$oPromotion->getDescription()}</b> es: <code><b><big>{$oSubscription->getCode1()}</big></b></code>
        Finaliza el proceso ingresandolo <a href='{$domain}/promocion/confirmar/{$oPromotion->getSlug()}' target='_blank'>aquí</a>
        </p>
        ";

        return $message;
    }

    private function _get_text_confirm()
    {
        $oPromotion = $this->objects["promotion"];
        $oUser = $this->objects["user"];
        $oSubscription = $this->objects["subscription"];

        $message = "
        <p>
            Hola <b>{$oUser->getName1()}</b>.<br/> 
        </p>
        <p>
            Gracias por confirmar tu suscripción en: <b>Promoción Nº:{$oPromotion->getId()} | {$oPromotion->getDescription()}</b>
        </p>
        <p>
            <b>Contenido:</b><br/>
            - Con cualquier trabajo técnico o moldeado el tratamiento Botox capilar es gratis.<br/>
            - Tratamiento Botox Capilar valorado en <b>15 €</b>
        </p>
        <br/>
        <b>Recuerda:</b>
        <ul>
            <li>Tu código: <code><b><big>{$oSubscription->getCode1()}</big></b></code></li>
            <li>Hacerla efectiva antes del día: <b>{$oPromotion->getDateTo()->format("Y-m-d")}</b></li>
            <li>Llamar al <b>91 455 74 43</b> o en <a href='https://doblerr.es/cita' target='_blank'>Doblerr.es/Cita</a> para poder concretar una cita.</li>
            <li>Solo se puede hacer efectiva la promoción los días: <b>Lunes a Miercoles de 14:00 a 19:00</b></li>            
            <li>Esta promoción es acumulable. Entra en el plan por puntos.</li>
            <li>Esta promoción puntúa en una unidad. Cuando obtengas diez unidades recibirás un email con un servicio de regalo.</li>
            <li>Proporcionar tu código después de hacer efectiva la promoción. Así lo podremos contabilizar para el regalo.</li>
            <li>La contabilización de puntos se realiza <b>por email</b>. Procura suscribirte a cualquier promoción siempre con el mismo correo electrónico</li>
        </ul>
        ";

        return $message;
    }

    private function _subscribe()
    {
        $oUser = $this->objects["user"];
        $oPromotion = $this->objects["promotion"];

        $data = [
            "from" => $this->get_env("APP_EMAIL_FROM"),
            "to" => $oUser->getEmail(),
            //"bcc" => [$this->get_env("APP_EMAIL_FROM"), $this->get_env("APP_EMAIL_TO")],
            "subject" => "doblerr noreply - Código de promoción: {$oPromotion->getId()}-{$oPromotion->getDescription()}",
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
        $oPromotion = $this->objects["promotion"];
        $oSubscription = $this->objects["subscription"];

        $data = [
            "from" => $this->get_env("APP_EMAIL_FROM"),
            "to" => $oUser->getEmail(),
            //"bcc" => [$this->get_env("APP_EMAIL_FROM"), $this->get_env("APP_EMAIL_TO")],
            "subject" => "doblerr noreply - Promoción Nº {$oPromotion->getId()} confirmada: {$oPromotion->getDescription()}",
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