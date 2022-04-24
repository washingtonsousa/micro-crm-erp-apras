<?php
namespace App\Core\Domain\Provider;

use App\Core\Domain\Abstraction\Interface\IUsuarioRepository;
use Lexik\Bundle\JWTAuthenticationBundle\Exception\UserNotFoundException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

class AuthUserProvider implements UserProviderInterface
{

    /**
     * @var IUsuarioRepository
     */
    private $userManager;

    public function __construct(IUsuarioRepository $userManager)
    {
        $this->userManager = $userManager;
    }

    public function loadUserByUsername($username)
    {
        var_dump($username);
        $foundedUser = $this->userManager->loadUserByIdentifier($username);

        if ($foundedUser === null) {
            throw new UserNotFoundException("", "");
        }

        return $foundedUser;
    }

    public function refreshUser(UserInterface $user)
    {
    }

    public function supportsClass($class)
    {
        // TODO: Implement supportsClass() method.
    }

    /**
     * Loads the user for the given user identifier (e.g. username or email).
     *
     * This method must throw UserNotFoundException if the user is not found.
     *
     * @throws UserNotFoundException
     */
    public function loadUserByIdentifier(string $identifier): UserInterface {

        $foundedUser = $this->userManager->loadUserByIdentifier($identifier);

        if ($foundedUser === null) {
            throw new UserNotFoundException("", "");
        }
        
        return $foundedUser;
    }
}