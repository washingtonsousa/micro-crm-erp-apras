<?php
namespace App\Controller;

use App\Core\Domain\Entity\TbUser;
use App\Core\Domain\Entity\User;
use App\Core\Shared\Handler\HandlerAggregator;
use App\Core\Shared\Model\DomainNotification;
use App\Core\Shared\Resolver\DependencyResolver;
use App\Core\Shared\Event\DomainNotificationEvent;
use DateTime;
use Doctrine\Persistence\ManagerRegistry;
use Namshi\JOSE\JWT;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Cache\Adapter\AdapterInterface;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class DefaultController extends AbstractController {

   private ManagerRegistry $doctrine;

        public function __construct(  ManagerRegistry $doctrine
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
    
      

         $user = new User();
         $user->setPassword($encoder->hashPassword($user, $password));
         $user->setEmail($email);
         $user->setName('Washington');
         $user->setIdAccessLevel('Admin');
         $user->setBirthday(new DateTime());
         $user->setDocumment("36036876807");
         $user->setGender("M");

         $user->setStatus(true);
         $em->persist($user);
         $em->flush();

         return new JsonResponse($user->getEmail());
        }

        public function testProtection() {
          return new Response(sprintf('Logged in as %s', json_encode($this->getUser()->getRoles())));
        }


}