<?php
namespace App\Core\Domain\Service;

use App\Core\Domain\Abstraction\Interface\IUnityOfWork;
use App\Core\Domain\Abstraction\Interface\IUsuarioRepository;
use App\Core\Domain\Abstraction\Interface\IUsuarioService;
use App\Core\Domain\Abstraction\PaginatedEntityRequest;
use App\Core\Domain\Command\CheckIfUserExistsCommand;
use App\Core\Domain\Command\CreateUserCommand;
use App\Core\Domain\Command\GetPageOfItemsCommand;
use App\Core\Domain\Command\GetUsersCommand;
use App\Core\Domain\Command\Result\CheckIfUserExistsCommandResult;
use App\Core\Domain\Entity\NonDatabaseEntity\PaginationAggregator;
use App\Core\Domain\Entity\NonDatabaseEntity\Query\GetUsuarioPaginatedEntityQuery;
use App\Core\Domain\Entity\Usuario;
use App\Core\Domain\Specification\UsuarioSpecification;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UsuarioService implements IUsuarioService {

    private IUsuarioRepository $userRepo;
    private UserPasswordHasherInterface $encoder;
    private IUnityOfWork $unityOfWork;

    public function __construct(UserPasswordHasherInterface $encoder, IUnityOfWork $unityOfWork, IUsuarioRepository $userRepo)
    {
            $this->encoder = $encoder;
            $this->unityOfWork = $unityOfWork;
            $this->userRepo = $userRepo;
    }



        public function CheckIfExists(Usuario $user) : ?bool {
                

                        $command = new CheckIfUserExistsCommand($user, $this->userRepo);

                        $result = $command->Execute();

                        if($result->isSuccess())
                                return $result->getResult();

                        return null;

        }

        public function Subscribe(Usuario $user) {
                

                if(!UsuarioSpecification::MustNotExists($this->CheckIfExists($user)))
                    return null;

                $command = new CreateUserCommand($user, $this->userRepo, $this->encoder,  $this->unityOfWork);

                $result = $command->Execute();

                if($result->isSuccess())
                        return $result->getUser();

                return null;

        }


        public function GetUsers(GetUsuarioPaginatedEntityQuery $paginatedRequest) : PaginationAggregator {

                
                $command = new GetPageOfItemsCommand($this->userRepo, $paginatedRequest);

                $result = $command->Execute();

                if($result->isSuccess())
                        return $result->getPaginationResult();

                return null;
        }



}