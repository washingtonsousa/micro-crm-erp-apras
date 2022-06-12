<?php
namespace App\Core\Domain\Event;

use App\Core\Domain\Abstraction\Interface\IUsuarioRepository;
use App\Core\Domain\Entity\Usuario;
use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationSuccessEvent;
use Symfony\Component\Security\Core\User\UserInterface;

class AuthenticationSuccessListener
{

      /**
     * @var IUsuarioRepository
     */
    private $userManager;

    public function __construct(IUsuarioRepository $userManager)
    {
        $this->userManager = $userManager;
    }

/**
 * @param AuthenticationSuccessEvent $event
 */
public function onAuthenticationSuccessResponse(AuthenticationSuccessEvent $event)
{
    $data = $event->getData();
    $user = $event->getUser();

    if (!$user instanceof UserInterface) {
        return;
    }

    $data['user'] = $user;

    $event->setData($data);

}

}