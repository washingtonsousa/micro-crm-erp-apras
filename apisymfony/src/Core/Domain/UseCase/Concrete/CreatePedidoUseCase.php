<?php
namespace App\Core\Domain\UseCase\Concrete;

use App\Core\Domain\Abstraction\Interface\IPedidoService;
use App\Core\Domain\Entity\Pedido;
use App\Core\Domain\UseCase\Abstractions\ICreatePedidoUseCase;

class CreatePedidoUseCase implements ICreatePedidoUseCase {

  

    public function __construct(protected IPedidoService $pedidoService)
    {
    }

    public function Execute(Pedido $pedido): ?Pedido
    {
        
    
        return $pedido;

    }


}