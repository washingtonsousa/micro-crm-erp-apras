<?php
namespace App\Core\Application\Service;

use App\Core\Application\Abstraction\Interface\IUsuarioAppService;
use App\Core\Application\Abstraction\ViewModel\PaginatedEntityRequestViewModel;
use App\Core\Application\Abstraction\ViewModel\Pagination\PaginationAggregatorViewModel;
use App\Core\Application\ViewModel\Request\UsuarioChangeSenhaRequestViewModel;
use App\Core\Application\ViewModel\UsuarioViewModel;
use App\Core\Domain\Abstraction\Interface\IUsuarioService;
use App\Core\Domain\Abstraction\PaginatedEntityRequest;
use App\Core\Domain\Entity\NonDatabaseEntity\Query\GetUsuarioPaginatedEntityQuery;
use App\Core\Domain\Entity\Usuario;
use App\Core\Domain\Specification\UsuarioSpecification;
use App\Core\Shared\Mapper\AutoMapperInitializer;
use AutoMapperPlus\AutoMapperInterface;

class UsuarioAppService implements IUsuarioAppService {

    protected IUsuarioService $userService;
    protected AutoMapperInterface $mapper;

    public function __construct(IUsuarioService $userService,
     AutoMapperInitializer $mapperInitializer)
    {
        $this->userService = $userService;

        $this->mapper = $mapperInitializer->getMapper();
    }

    public function register(UsuarioViewModel $userViewModel) : ?UsuarioViewModel {

        $usuario = $this->mapper->map($userViewModel, Usuario::class);

        if(!UsuarioSpecification::IsValidForInsert($usuario))
            return null;

        $result =  $this->userService->subscribe($usuario);
     
        if($result == null)
            return null;

        $userViewModel = $this->mapper->map($result, UsuarioViewModel::class);


        return    $userViewModel ;


    }

    public function update(UsuarioViewModel $userViewModel, $id, $changeSenha = false) : UsuarioViewModel {


        $usuario = $this->mapper->map($userViewModel, Usuario::class);

        $result =  $this->userService->update($usuario, $id, $changeSenha);
     
        if($result == null)
            return null;

        $userViewModel = $this->mapper->map($result, UsuarioViewModel::class);

        return    $userViewModel ;


    }

    
    public function remove($id) : bool {
        
        return $this->userService->remove($id);

    }

    public function partialUpdate(UsuarioChangeSenhaRequestViewModel $changeSenhaData) : ?UsuarioViewModel {

        $usuario = $this->userService->changeCurrentLoggedInUserSenha($changeSenhaData->oldPassword, $changeSenhaData->password);

        if($usuario == null)
        return $usuario;

        $userViewModel = $this->mapper->map($usuario, UsuarioViewModel::class);

        return  $userViewModel;

    }

    public function get(PaginatedEntityRequestViewModel $paramsModel) : PaginationAggregatorViewModel {

        $params = $this->mapper->map($paramsModel, PaginatedEntityRequest::class);

        $query = new GetUsuarioPaginatedEntityQuery($params);

        $domainResult  =$this->userService->getUsers($query);

        $result =  $this->mapper->map( $domainResult, PaginationAggregatorViewModel::class);
        return  $result;
    }

    public function getById(int $id) : ?UsuarioViewModel {

        $result =  $this->mapper->map($this->userService->getUsuarioById($id), UsuarioViewModel::class);
        return  $result;

    }



}
