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

class UpdateUserCommand extends Command {


    private Usuario $user;
    private IUsuarioRepository $userRepo;
    private UserPasswordHasherInterface $encoder;
    private IUnityOfWork $unityOfWork;

    public function __construct(Usuario $user, IUsuarioRepository $userRepo,UserPasswordHasherInterface $encoder, IUnityOfWork $unityOfWork)
    {
        parent::__construct();
        $this->unityOfWork = $unityOfWork;
        $this->user = $user;
        $this->userRepo = $userRepo;
        $this->encoder = $encoder;
            
    }

    public function GenerateResult() {

        try {
            
            
            $this->user->setDataAtualizacao(new DateTime());

            $this->userRepo->persist($this->user); 

            $statementResult = $this->unityOfWork->Commit();

            var_dump($statementResult);

            $this->setResult(new CreateUserCommandResult(!$statementResult->hasException() ? $this->user : null));


        } catch(Exception $ex) {
            $this->setResult(new CreateUserCommandResult(null));
        }
    }

    public function ValidateResult() {
            //TODO
            return  $this->contract->MustBeNotNull($this->getResult()->getUser(), "Ocorreu um problema ao tentar cadastrar o usuário, consulte logs para maiores detalhes");
    }

}
