<?php
namespace App\Core\Domain\Service;

use App\Core\Domain\Abstraction\Interface\IUnityOfWork;
use App\Core\Domain\Abstraction\Interface\IUsuarioRepository;
use App\Core\Domain\Abstraction\Interface\IUsuarioService;
use App\Core\Domain\Command\CreateUserCommand;
use App\Core\Domain\Entity\Usuario;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UsuarioService implements IUsuarioService {

    private IUsuarioRepository $_userRepo;
    private UserPasswordHasherInterface $encoder;
    private IUnityOfWork $unityOfWork;

    public function __construct(UserPasswordHasherInterface $encoder, IUnityOfWork $unityOfWork)
    {
            $this->encoder = $encoder;
            $this->unityOfWork = $unityOfWork;
    }

        public function Subscribe(Usuario $user) {

                
                $command = new CreateUserCommand($user, $this->_userRepo, $this->encoder,  $this->unityOfWork);

                $result = $command->Execute();

                if($result->isSuccess())
                        return $result;

                return null;

        }



}