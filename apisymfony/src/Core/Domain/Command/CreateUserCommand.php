<?php
namespace App\Core\Domain\Command;

use App\Core\Domain\Abstraction\Command\Command;
use App\Core\Domain\Abstraction\Interface\IUnityOfWork;
use App\Core\Domain\Abstraction\Interface\IUsuarioRepository;
use App\Core\Domain\Command\Result\CreateUserCommandResult;
use App\Core\Domain\Entity\Usuario;
use Exception;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class CreateUserCommand extends Command {


    private Usuario $user;
    private IUsuarioRepository $_userRepo;
    private UserPasswordHasherInterface $encoder;
    private IUnityOfWork $unityOfWork;

    public function __construct(Usuario $user, IUsuarioRepository $userRepo,UserPasswordHasherInterface $encoder, IUnityOfWork $unityOfWork)
    {
        $this->unityOfWork = $unityOfWork;

            $this->_user = $user;
            $this->_userRepo = $userRepo;


                    $this->encoder = $encoder;
            
    }

    public function GenerateResult() {

        try {
            $this->user->setSenha($this->encoder->hashPassword($this->user, $this->user->getPassword()));
            $result = $this->_userRepo->insert($this->user);
            $this->unityOfWork->Commit();
            $this->setResult(new CreateUserCommandResult($result));

        } catch(Exception $ex) {
            $this->setResult(new CreateUserCommandResult(null));
        }
    }

    public function ValidateResult() {
            //TODO
            return null;
    }

}
