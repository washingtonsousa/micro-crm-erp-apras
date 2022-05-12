<?php
namespace App\Core\Domain\Command;

use App\Core\Domain\Abstraction\Command\Command;
use App\Core\Domain\Abstraction\Interface\IUnityOfWork;
use App\Core\Domain\Abstraction\Interface\IUsuarioRepository;
use App\Core\Domain\Command\Result\CreateUserCommandResult;
use App\Core\Domain\Command\Result\PersistCommandResult;
use App\Core\Domain\Command\Result\PersistUserCommandResult;
use App\Core\Domain\Entity\Usuario;
use DateTime;
use Exception;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class PersistCommand extends Command {


    private mixed $entity;
    private IUnityOfWork $unityOfWork;

    public function __construct(mixed $entity,  IUnityOfWork $unityOfWork)
    {
        parent::__construct();
        $this->unityOfWork = $unityOfWork;
        $this->entity = $entity;
            
    }

    public function GenerateResult() {

        try {
            
            $this->unityOfWork->Persist($this->entity); 

            $statementResult = $this->unityOfWork->Commit();

            $this->setResult(new PersistCommandResult(!$statementResult->hasException() ? $this->entity : null));

        } catch(Exception $ex) {
            $this->setResult(new PersistCommandResult(null));
        }
    }

    public function ValidateResult() {
            //TODO
            return  $this->contract->MustBeNotNull($this->getResult()->getEntity(), "Ocorreu um problema ao tentar persistir a informação, consulte logs para maiores detalhes");
    }

}
