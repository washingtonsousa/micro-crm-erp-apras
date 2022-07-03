<?php
namespace App\Core\Domain\UseCase\Abstractions;

use App\Core\Domain\Entity\FichaProducao;
use App\Core\Domain\Entity\Pedido;

interface ICreatePedidoUseCase {


 public function  Execute(Pedido $ficha) : ?Pedido;


}