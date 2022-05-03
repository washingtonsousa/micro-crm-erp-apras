<?php
namespace App\Core\Application\Service;

use App\Core\Application\Abstraction\Interface\IUsuarioAppService;
use App\Core\Application\Abstraction\ViewModel\PaginatedEntityRequestViewModel;
use App\Core\Application\ViewModel\Pagination\UsuarioPaginationResponseViewModel;
use App\Core\Application\ViewModel\Request\UsuarioGetRequestViewModel as RequestUsuarioGetRequestViewModel;
use App\Core\Application\ViewModel\UsuarioViewModel;
use App\Core\Domain\Abstraction\Interface\IUsuarioService;
use App\Core\Domain\Abstraction\PaginatedEntityRequest;
use App\Core\Domain\Entity\NonDatabaseEntity\PaginationAggregator;
use App\Core\Domain\Entity\NonDatabaseEntity\Query\GetUsuarioPaginatedEntityQuery;
use App\Core\Domain\Entity\Usuario;
use App\Core\Domain\Specification\UsuarioSpecification;
use App\Core\Shared\Mapper\AutoMapperInitializer;
use AutoMapperPlus\AutoMapperInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use UsuarioGetRequestViewModel;

class UsuarioAppService implements IUsuarioAppService {

    protected IUsuarioService $userService;
    protected AutoMapperInterface $mapper;

    public function __construct(IUsuarioService $userService,
     AutoMapperInitializer $mapperInitializer)
    {
        $this->userService = $userService;

        $this->mapper = $mapperInitializer->getMapper();
    }

    public function register(UsuarioViewModel $userViewModel) {

        $usuario = $this->mapper->map($userViewModel, Usuario::class);

        if(!UsuarioSpecification::IsValidForInsert($usuario))
            return null;

        $result =  $this->userService->subscribe($usuario);
     
        if($result == null)
            return null;

        $userViewModel = $this->mapper->map($result, UsuarioViewModel::class);


        return    $userViewModel ;


    }

    public function update(UsuarioViewModel $userViewModel) : UsuarioViewModel {

        $usuario = $this->mapper->map($userViewModel, Usuario::class);

        $result =  $this->userService->getCurrentLoggedInUser();
     
        if($result == null)
            return null;

        $userViewModel = $this->mapper->map($result, UsuarioViewModel::class);

        return    $userViewModel ;


    }

    public function partialUpdate(UsuarioViewModel $userViewModel) : UsuarioViewModel {

        $usuario = $this->mapper->map($userViewModel, Usuario::class);

        $result =  $this->userService->update($usuario);
     
        if($result == null)
            return null;

        $userViewModel = $this->mapper->map($result, UsuarioViewModel::class);

        return    $userViewModel ;


    }

    public function getUsers(PaginatedEntityRequestViewModel $paramsModel) : UsuarioPaginationResponseViewModel {

        $params = $this->mapper->map($paramsModel, PaginatedEntityRequest::class);

        $query = new GetUsuarioPaginatedEntityQuery($params);

        $result =  $this->mapper->map($this->userService->getUsers($query), UsuarioPaginationResponseViewModel::class);

        return  $result;
    }



}
