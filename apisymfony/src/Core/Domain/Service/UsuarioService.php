<?php
namespace App\Core\Domain\Service;

use App\Core\Domain\Abstraction\Interface\IUnityOfWork;
use App\Core\Domain\Abstraction\Interface\IUsuarioRepository;
use App\Core\Domain\Abstraction\Interface\IUsuarioService;
use App\Core\Domain\Abstraction\PaginatedEntityRequest;
use App\Core\Domain\Command\CheckIfUserExistsCommand;
use App\Core\Domain\Command\CreateUserCommand;
use App\Core\Domain\Command\GetPageOfItemsCommand;
use App\Core\Domain\Command\GetUserCommand;
use App\Core\Domain\Command\GetUsersCommand;
use App\Core\Domain\Command\PersistCommand;
use App\Core\Domain\Command\PersistUserCommand;
use App\Core\Domain\Command\Result\CheckIfUserExistsCommandResult;
use App\Core\Domain\Command\UpdateUserCommand;
use App\Core\Domain\Entity\NonDatabaseEntity\PaginationAggregator;
use App\Core\Domain\Entity\NonDatabaseEntity\Query\GetUsuarioPaginatedEntityQuery;
use App\Core\Domain\Entity\Usuario;
use App\Core\Domain\Specification\UsuarioSpecification;
use DateTime;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class UsuarioService implements IUsuarioService {

    private IUsuarioRepository $userRepo;
    private UserPasswordHasherInterface $encoder;
    private IUnityOfWork $unityOfWork;
    protected TokenStorageInterface $tokenInterface;

    public function __construct(TokenStorageInterface $tokenInterface, 
    UserPasswordHasherInterface $encoder, IUnityOfWork $unityOfWork, IUsuarioRepository $userRepo)
    {
            $this->encoder = $encoder;
            $this->unityOfWork = $unityOfWork;
            $this->userRepo = $userRepo;
            $this->tokenInterface = $tokenInterface;

    }



        public function CheckIfExists(Usuario $user) : ?bool {
                

                        $command = new CheckIfUserExistsCommand($user, $this->userRepo);

                        $result = $command->Execute();

                        if($result->isSuccess())
                                return $result->getResult();

                        return null;

        }

        public function getCurrentLoggedInUser() : ?Usuario {

                $token = $this->tokenInterface->getToken();
        
                if (!$token) {
                    return null;
                }
            
                $user = $token->getUser();
            
                 if (!$user instanceof Usuario) {
                     return null;
                 }
        
                return $user;
            }


       public function remove($id) : bool {

                $usuarioForUpdate = $this->getUsuarioById($id); 

                if($usuarioForUpdate == null)
                        return false;

                $this->unityOfWork->Remove($usuarioForUpdate);

                $stmResult =  $this->unityOfWork->Commit();
        
                if($stmResult->isSuccess())
                        return true;

                return false;
        }


        public function update(Usuario $usuario, $id, $changeSenha = false) {

                $usuarioForUpdate = $this->getUsuarioById($id); 
                
                $usuarioForUpdate->fullUpdate($usuario);

                if($changeSenha)
                   $usuarioForUpdate->setSenha($this->encoder->hashPassword($this->user, $this->user->getPassword()));

                $command = new PersistCommand($usuarioForUpdate, $this->unityOfWork);

                $result = $command->Execute();

                if($result->isSuccess())
                        return $result->getEntity();

                return null;
        }

        public function subscribe(Usuario $user) {
                

                if(!UsuarioSpecification::MustNotExists($this->CheckIfExists($user)))
                    return null;

                $user->setSenha($this->encoder->hashPassword($user, $user->getPassword()));
                $user->setDataCriacao(new DateTime());

                $command = new PersistCommand($user, $this->unityOfWork);

                $result = $command->Execute();

                if($result->isSuccess())
                        return $result->getEntity();

                return null;

        }


        public function getUsers(GetUsuarioPaginatedEntityQuery $paginatedQuery) : PaginationAggregator {

                
                $command = new GetPageOfItemsCommand($this->userRepo, $paginatedQuery);

                $result = $command->Execute();
               

                if($result->isSuccess())
                        return $result->getPaginationResult();

                return null;
        }


        public function getUsuarioById(int $id) : ?Usuario {
                
                $command = new GetUserCommand($id, $this->userRepo);

                $result = $command->Execute();

                if($result->isSuccess())
                        return $result->getUsuario();

                return null;
        }



}