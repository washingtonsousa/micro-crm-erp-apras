<?php
namespace App\Core\Domain\Service;

use App\Core\Domain\Abstraction\Interface\IClienteRepository;
use App\Core\Domain\Abstraction\Interface\IClienteService;
use App\Core\Domain\Abstraction\Interface\IUnityOfWork;
use App\Core\Domain\Abstraction\Interface\IUsuarioRepository;
use App\Core\Domain\Abstraction\Interface\IUsuarioService;
use App\Core\Domain\Abstraction\PaginatedEntityRequest;
use App\Core\Domain\Command\CheckIfUserExistsCommand;
use App\Core\Domain\Command\CreateUserCommand;
use App\Core\Domain\Command\GetEntityCommand;
use App\Core\Domain\Command\GetPageOfItemsCommand;
use App\Core\Domain\Command\GetUserCommand;
use App\Core\Domain\Command\GetUsersCommand;
use App\Core\Domain\Command\PersistCommand;
use App\Core\Domain\Command\PersistUserCommand;
use App\Core\Domain\Command\Result\CheckIfUserExistsCommandResult;
use App\Core\Domain\Command\Result\GetEntityCommandResult;
use App\Core\Domain\Command\UpdateUserCommand;
use App\Core\Domain\Entity\Cliente;
use App\Core\Domain\Entity\NonDatabaseEntity\PaginationAggregator;
use App\Core\Domain\Entity\NonDatabaseEntity\Query\GetClientePaginatedEntityQuery;
use App\Core\Domain\Entity\NonDatabaseEntity\Query\GetUsuarioPaginatedEntityQuery;
use App\Core\Domain\Entity\Usuario;
use App\Core\Domain\Specification\UsuarioSpecification;
use DateTime;
use Predis\Client;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class ClienteService implements IClienteService {

    private IClienteRepository $repo;
    private UserPasswordHasherInterface $encoder;
    private IUnityOfWork $unityOfWork;
    protected TokenStorageInterface $tokenInterface;

    public function __construct(TokenStorageInterface $tokenInterface, 
    UserPasswordHasherInterface $encoder, IUnityOfWork $unityOfWork, IClienteRepository $repo)
    {
            $this->encoder = $encoder;
            $this->unityOfWork = $unityOfWork;
            $this->repo = $repo;
            $this->tokenInterface = $tokenInterface;

    }



        public function CheckIfExists(Cliente $cliente) : ?bool {
                

                        // $command = new CheckIfUserExistsCommand($user, $this->userRepo);

                        // $result = $command->Execute();

                        // if($result->isSuccess())
                        //         return $result->getResult();

                        return null;

        }



       public function remove($id) : bool {

                $clienteForUpdate = $this->getClienteById($id); 

                if($clienteForUpdate == null)
                        return false;

                $this->unityOfWork->Remove($clienteForUpdate);

                $stmResult =  $this->unityOfWork->Commit();
        
                if($stmResult->isSuccess())
                        return true;

                return false;
        }


        public function update(Cliente $usuario, $id) {

                $clienteForUpdate = $this->getClienteById($id); 
                
               // $usuarioForUpdate->fullUpdate($usuario);

                $command = new PersistCommand($clienteForUpdate, $this->unityOfWork);

                $result = $command->Execute();

                if($result->isSuccess())
                        return $result->getEntity();

                return null;
        }

        public function subscribe(Cliente $cliente) {
                

                // if(!UsuarioSpecification::MustNotExists($this->CheckIfExists($user)))
                //     return null;

                $command = new PersistCommand($cliente, $this->unityOfWork);

                $result = $command->Execute();

                if($result->isSuccess())
                        return $result->getEntity();

                return null;

        }


        public function getClientes(GetClientePaginatedEntityQuery $paginatedQuery): PaginationAggregator
        {

                $command = new GetPageOfItemsCommand($this->repo, $paginatedQuery);

                $result = $command->Execute();

                if($result->isSuccess())
                        return $result->getPaginationResult();

                return null;
        }


        public function getClienteById(int $id): ?Cliente
        {
                
                $command = new GetEntityCommand($id, $this->repo);

                $result = $command->Execute();

                if($result->isSuccess())
                        return $result->getEntity();

                return null;
        }



}