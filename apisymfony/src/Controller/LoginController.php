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

class LoginController extends AbstractController {


        public function __construct(  
        )
        {

    
        }
        
        public function login() {
            

            return new Response("teste");
        }

       

}