<?php
namespace App\Core\Domain\Command;

use App\Core\Domain\Abstraction\Command\Command;
use App\Core\Domain\Abstraction\Interface\IUnityOfWork;
use App\Core\Domain\Abstraction\Interface\IUsuarioRepository;
use App\Core\Domain\Command\Result\CreateUserCommandResult;
use App\Core\Domain\Entity\Usuario;
use DateTime;
use Exception;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class CreateUserCommand extends Command {


    private Usuario $user;
    private IUsuarioRepository $userRepo;
    private UserPasswordHasherInterface $encoder;
    private IUnityOfWork $unityOfWork;

    public function __construct(Usuario $user, IUsuarioRepository $userRepo,UserPasswordHasherInterface $encoder, IUnityOfWork $unityOfWork)
    {
        $this->unityOfWork = $unityOfWork;

            $this->user = $user;
            $this->userRepo = $userRepo;


                    $this->encoder = $encoder;
            
    }

    public function GenerateResult() {

        try {
            
            $this->user->setSenha($this->encoder->hashPassword($this->user, $this->user->getPassword()));
            $this->user->setDataCriacao(new DateTime());
            $this->userRepo->insert($this->user); 
            $this->unityOfWork->Commit();
            $this->setResult(new CreateUserCommandResult($this->user));

        } catch(Exception $ex) {
            $this->setResult(new CreateUserCommandResult(null));
        }
    }

    public function ValidateResult() {
            //TODO
            return null;
    }

}
