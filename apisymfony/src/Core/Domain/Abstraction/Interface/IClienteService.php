<?php
namespace App\Core\Domain\Abstraction\Interface;

use App\Core\Domain\Entity\Cliente;

interface IClienteService {

            public function getById(int $id) : ?Cliente;
            public function remove($id) : bool;
            public function CheckIfExists(Cliente $cliente) : ?bool;
}