<?php
//proyecto\src\Controller\Common\SecurityController.php
namespace App\Controller\Common;

use App\Controller\BaseController;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\User;
use App\Form\RegisterType;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends BaseController
{

    /**
     * @var UserRepository
     */
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login(AuthenticationUtils $authentication)
    {
        $error = $authentication->getLastAuthenticationError();

        if($error) {
            print_r("SecurityController.login");
            dump($error);
            die;
        }
        $lastUsername = $authentication->getLastUsername();
        return $this->render("open/security/login.html.twig",[
            "error" => $error,
            "_last_username"=>$lastUsername
        ]);
    }
}//SecurityController
