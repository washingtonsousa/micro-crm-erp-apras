<?php
namespace App\Core\Domain\UseCase\Concrete;

use App\Core\Domain\Abstraction\Interface\IClienteService;
use App\Core\Domain\Abstraction\Interface\IPedidoService;
use App\Core\Domain\Abstraction\Interface\IPersistanceDomainService;
use App\Core\Domain\Entity\Cliente;
use App\Core\Domain\Entity\Pedido;
use App\Core\Domain\Specification\ClienteSpecification;
use App\Core\Domain\UseCase\Abstractions\IClienteFullUpdateUseCase;
use App\Core\Domain\UseCase\Abstractions\ICreatePedidoUseCase;

class ClienteFullUpdateUseCase implements IClienteFullUpdateUseCase {

  

    public function __construct(protected IClienteService $clienteDomainService, 
    protected IPersistanceDomainService $persistDomainService)
    {
    }

    public function Execute(Cliente $cliente): ?Cliente
    {

        if(!ClienteSpecification::IsValidForUpdate($cliente))
        return null;

        $clienteForUpdate = $this->clienteDomainService->getById($cliente->getIdCliente()); 

        if(!ClienteSpecification::MustNotBeNull($clienteForUpdate))
        return null;

        if(!ClienteSpecification::MustNotExists($this->clienteDomainService->CheckIfExists($cliente)))
        return null;
        
        $clienteForUpdate->fullUpdate($cliente);

        $clienteForUpdate = $this->persistDomainService->persistEntity($clienteForUpdate);

        return $clienteForUpdate;

    }


}