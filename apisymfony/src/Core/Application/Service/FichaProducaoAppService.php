<?php
namespace App\Core\Application\Service;

use App\Core\Application\Abstraction\Interface\IFichaProducaoAppService;
use App\Core\Application\Abstraction\ViewModel\PaginatedEntityRequestViewModel;
use App\Core\Application\Abstraction\ViewModel\Pagination\FichaProducaoPaginationAggregatorViewModel;
use App\Core\Application\Abstraction\ViewModel\Pagination\PaginationAggregatorViewModel;
use App\Core\Application\ViewModel\FichaProducaoViewModel;
use App\Core\Application\ViewModel\UsuarioViewModel;
use App\Core\Domain\Abstraction\Interface\IFichaProducaoService;
use App\Core\Domain\Abstraction\PaginatedEntityRequest;
use App\Core\Domain\Entity\FichaProducao;
use App\Core\Domain\Entity\NonDatabaseEntity\Query\GetFichaProducaoPaginatedEntityQuery;
use App\Core\Domain\Entity\NonDatabaseEntity\Query\GetUsuarioPaginatedEntityQuery;
use App\Core\Domain\Entity\Usuario;
use App\Core\Domain\UseCase\Abstractions\ICreateFichaProducaoUseCase;
use App\Core\Domain\UseCase\Abstractions\IFichaProducaoStateControlUseCase;
use App\Core\Shared\Event\AssertionConcern;
use App\Core\Shared\Mapper\AutoMapperInitializer;
use App\Core\Shared\Resolver\DependencyResolver;
use AutoMapperPlus\AutoMapperInterface;

class FichaProducaoAppService implements IFichaProducaoAppService {

    protected AutoMapperInterface $mapper;

    public function __construct(
     protected IFichaProducaoService $fichaService,
     AutoMapperInitializer $mapperInitializer, 
     protected IFichaProducaoStateControlUseCase $stateControlUseCase,
     protected ICreateFichaProducaoUseCase $fichaCreateUseCase)
    {
        $this->fichaService = $fichaService;
        $this->mapper = $mapperInitializer->getMapper();
    }

    public function subscribe(FichaProducaoViewModel $fichaViewModel) : ?FichaProducaoViewModel {

        $ficha = $this->mapper->map($fichaViewModel, FichaProducao::class);

        $result =  $this->fichaCreateUseCase->Execute($ficha);
     
        if($result == null)
            return null;

        $fichaViewModel = $this->mapper->map($result, FichaProducaoViewModel::class);

        return  $fichaViewModel ;
    }



    public function patch(FichaProducaoViewModel $fichaViewModel, $id): ?FichaProducaoViewModel {

        $ficha = $this->mapper->map($fichaViewModel, FichaProducao::class);

        $ficha->setIdFichaProducao($id);

        $result =  $this->stateControlUseCase->Execute($ficha, $id);
     
        if($result == null)
            return null;

        $fichaViewModel = $this->mapper->map($result, FichaProducaoViewModel::class);

        return    $fichaViewModel ;


    }


    public function update(FichaProducaoViewModel $fichaViewModel, $id) : FichaProducaoViewModel {

        $usuario = $this->mapper->map($fichaViewModel, FichaProducao::class);

        $result =  $this->fichaService->update($usuario, $id);
     
        if($result == null)
            return null;

        $fichaViewModel = $this->mapper->map($result, FichaProducaoViewModel::class);

        return    $fichaViewModel ;


    }

    
    public function remove($id) : bool {
        
        return $this->fichaService->remove($id);

    }


    public function get(PaginatedEntityRequestViewModel $paramsModel) : ?PaginationAggregatorViewModel {

        $params = $this->mapper->map($paramsModel, PaginatedEntityRequest::class);

        $query = new GetFichaProducaoPaginatedEntityQuery($params);

        DependencyResolver::make("app.logger")->info('FichaProducaoAppService:get');

        $result =  $this->fichaService->get($query);

        $result =  $this->mapper->map( $result, FichaProducaoPaginationAggregatorViewModel::class);
        

        return  $result;
    }

    public function getById(int $id) : ?FichaProducaoViewModel {

        if(AssertionConcern::IsSatisfiedBy(array(

                AssertionConcern::AssertTrue($id > 0, "Id inválido")

        )))

        $result =  $this->mapper->map($this->fichaService->getById($id), FichaProducaoViewModel::class);
        return  $result;


    }



}
