<?php
namespace App\Controller;

use App\Core\Domain\Entity\Usuario;
use DateTime;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UsuarioController extends AbstractController {

   private ManagerRegistry $doctrine;

        public function __construct(ManagerRegistry $doctrine
        )
        {
          $this->doctrine =  $doctrine;
    
        }
        
        public function index() {
            
            $queryFetched = $this->doctrine->getRepository(TbUser::class)->findAll();


            return new Response(json_encode( $queryFetched));
        }

        public function register(Request $request, UserPasswordHasherInterface $encoder)
        {
         $em = $this->doctrine->getManager();

         $parameters = json_decode($request->getContent(), true);

         $password =  $parameters['password'];
         $email =  $parameters['email'];
    
         $user = new Usuario();
         $user->setSenha($encoder->hashPassword($user, $password));
         $user->setEmail($email);
         $user->setNome('Washington');
         $user->setNivelAcesso(0);
         $user->setDocumento("36036876807");
         $user->setStatus(true);
         $user->setDtUltimoLogin(new DateTime());
         $em->persist($user);
         $em->flush();

         return new JsonResponse($user->getEmail());
        }

        public function testProtection() {
          return new Response(sprintf('Logged in as %s', json_encode($this->getUser()->getRoles())));
        }


}