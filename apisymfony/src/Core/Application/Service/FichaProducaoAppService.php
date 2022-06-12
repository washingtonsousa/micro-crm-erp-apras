<?php
namespace App\Core\Application\Service;

use App\Core\Application\Abstraction\Interface\IFichaProducaoAppService;
use App\Core\Application\Abstraction\ViewModel\PaginatedEntityRequestViewModel;
use App\Core\Application\Abstraction\ViewModel\Pagination\PaginationAggregatorViewModel;
use App\Core\Application\ViewModel\FichaProducaoViewModel;
use App\Core\Application\ViewModel\UsuarioViewModel;
use App\Core\Domain\Abstraction\Interface\IFichaProducaoService;
use App\Core\Domain\Abstraction\PaginatedEntityRequest;
use App\Core\Domain\Entity\FichaProducao;
use App\Core\Domain\Entity\NonDatabaseEntity\Query\GetUsuarioPaginatedEntityQuery;
use App\Core\Domain\Entity\Usuario;
use App\Core\Shared\Mapper\AutoMapperInitializer;
use AutoMapperPlus\AutoMapperInterface;

class FichaProducaoAppService implements IFichaProducaoAppService {

    protected IFichaProducaoService $userService;
    protected AutoMapperInterface $mapper;

    public function __construct(IFichaProducaoService $userService,
     AutoMapperInitializer $mapperInitializer)
    {
        $this->userService = $userService;

        $this->mapper = $mapperInitializer->getMapper();
    }

    public function subscribe(FichaProducaoViewModel $userViewModel) : ?FichaProducaoViewModel {

        $usuario = $this->mapper->map($userViewModel, FichaProducao::class);

        // if(!UsuarioSpecification::IsValidForInsert($usuario))
        //     return null;

        $result =  $this->userService->subscribe($usuario);
     
        if($result == null)
            return null;

        $userViewModel = $this->mapper->map($result, FichaProducaoViewModel::class);


        return    $userViewModel ;


    }

    public function update(FichaProducaoViewModel $userViewModel, $id) : FichaProducaoViewModel {

        $usuario = $this->mapper->map($userViewModel, Usuario::class);

        $result =  $this->userService->update($usuario, $id);
     
        if($result == null)
            return null;

        $userViewModel = $this->mapper->map($result, UsuarioViewModel::class);

        return    $userViewModel ;


    }

    
    public function remove($id) : bool {
        
        return $this->userService->remove($id);

    }


    public function get(PaginatedEntityRequestViewModel $paramsModel) : PaginationAggregatorViewModel {

        $params = $this->mapper->map($paramsModel, PaginatedEntityRequest::class);

        $query = new GetUsuarioPaginatedEntityQuery($params);

        $domainResult  = null;

        $result =  $this->mapper->map( $domainResult, PaginationAggregatorViewModel::class);
        return  $result;
    }

    public function getById(int $id) : ?FichaProducaoViewModel {

        $result =  null;
        return  $result;

    }



}
