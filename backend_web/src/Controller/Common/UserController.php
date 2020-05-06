<?php
//proyecto\src\Controller\Common\UserController.php
namespace App\Controller\Common;

use App\Controller\BaseController;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\User;
use App\Form\RegisterType;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class UserController extends BaseController
{

    /**
     * @var UserRepository
     */
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function register(Request $request, UserPasswordEncoderInterface $encoder)
    {
        $user = new User();
        //mapea el formulario con la entidad
        $form = $this->createForm(RegisterType::class,$user);
        //rellena la entidad con los datos del formulario
        $form->handleRequest($request);
        //si hay datos en POST|GET
        if($form->isSubmitted() && $form->isValid())
        {
            //roles: 1:admin, 2:system, 3:enterprise, 4:user, 5:anonymous
            $user->setIdProfile(3);//user
            $user->setUpdateDate(new \DateTime("now"));
            //cifrando la contraseña
            $encoded = $encoder->encodePassword($user,$user->getPassword());
            $user->setPassword($encoded);
            $this->userRepository->save($user);
            return $this->redirectToRoute("tasks");
        }
        
        return $this->render('common/user/register.html.twig', [
            "form" => $form->createView()
        ]);
    }
    
    public function login(AuthenticationUtils $authentication)
    {
        $error = $authentication->getLastAuthenticationError();

        if($error) {
            print_r("usercontroller.login");
            dump($error);
            die;
        }
        $lastUsername = $authentication->getLastUsername();
        return $this->render("common/user/login.html.twig",[
            "error" => $error,
            "_last_username"=>$lastUsername
        ]);
    }

    public function index()
    {
        $users = $this->userRepository->findBy([],["id"=>"DESC"]);
        return $this->render("restrict/system/user/index.html.twig",["users"=>$users]);
    }




}//UserController
