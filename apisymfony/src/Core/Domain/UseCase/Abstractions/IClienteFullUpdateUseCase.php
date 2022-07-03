<?php
namespace App\Core\Domain\UseCase\Abstractions;

use App\Core\Domain\Entity\Cliente;

interface IClienteFullUpdateUseCase {


 public function  Execute(Cliente $cliente) : ?Cliente;


}