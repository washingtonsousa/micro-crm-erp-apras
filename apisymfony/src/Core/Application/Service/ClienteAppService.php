<?php
namespace App\Core\Application\Service;

use App\Core\Application\Abstraction\Interface\IClienteAppService;
use App\Core\Application\Abstraction\Interface\IUsuarioAppService;
use App\Core\Application\Abstraction\ViewModel\PaginatedEntityRequestViewModel;
use App\Core\Application\Abstraction\ViewModel\Pagination\PaginationAggregatorViewModel;
use App\Core\Application\ViewModel\ClienteViewModel;
use App\Core\Application\ViewModel\Pagination\UsuarioPaginationResponseViewModel;
use App\Core\Application\ViewModel\Request\UsuarioGetRequestViewModel as RequestUsuarioGetRequestViewModel;
use App\Core\Application\ViewModel\UsuarioViewModel;
use App\Core\Domain\Abstraction\Interface\IClienteService;
use App\Core\Domain\Abstraction\Interface\IUsuarioService;
use App\Core\Domain\Abstraction\PaginatedEntityRequest;
use App\Core\Domain\Entity\Cliente;
use App\Core\Domain\Entity\NonDatabaseEntity\PaginationAggregator;
use App\Core\Domain\Entity\NonDatabaseEntity\Query\GetClientePaginatedEntityQuery;
use App\Core\Domain\Entity\NonDatabaseEntity\Query\GetUsuarioPaginatedEntityQuery;
use App\Core\Domain\Entity\Usuario;
use App\Core\Domain\Specification\UsuarioSpecification;
use App\Core\Shared\Mapper\AutoMapperInitializer;
use AutoMapperPlus\AutoMapperInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use UsuarioGetRequestViewModel;

class ClienteAppService implements IClienteAppService{

    protected IClienteService $service;
    protected AutoMapperInterface $mapper;

    public function __construct(IClienteService $service,
     AutoMapperInitializer $mapperInitializer)
    {
        $this->service = $service;

        $this->mapper = $mapperInitializer->getMapper();
    }

    public function subscribe(ClienteViewModel $clienteViewModel) : ?ClienteViewModel {

        $cliente = $this->mapper->map($clienteViewModel, Cliente::class);

        // if(!UsuarioSpecification::IsValidForInsert($usuario))
        //     return null;

        $result =  $this->service->subscribe($cliente);
     
        if($result == null)
            return null;

        $userViewModel = $this->mapper->map($result, ClienteViewModel::class);


        return    $userViewModel ;


    }

    public function update(ClienteViewModel $clienteViewModel, $id) : ClienteViewModel {

        $usuario = $this->mapper->map($clienteViewModel, Cliente::class);

        $result =  $this->service->update($usuario, $id);
     
        if($result == null)
            return null;

        $clienteViewModel = $this->mapper->map($result, ClienteViewModel::class);

        return    $clienteViewModel ;


    }

    
    public function remove($id) : bool {
        
        return $this->service->remove($id);

    }


    public function getClientes(PaginatedEntityRequestViewModel $paramsModel): PaginationAggregatorViewModel
     {

        $params = $this->mapper->map($paramsModel, PaginatedEntityRequest::class);

        $query = new GetClientePaginatedEntityQuery($params);

        $domainResult  =$this->service->getClientes($query);

        $result =  $this->mapper->map( $domainResult, PaginationAggregatorViewModel::class);
        return  $result;
    }

    public function getClienteById(int $id): ?ClienteViewModel
    {

        $result =  $this->mapper->map($this->service->getClienteById($id), ClienteViewModel::class);
        return  $result;

    }



}
