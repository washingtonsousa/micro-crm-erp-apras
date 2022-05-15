<?php
namespace App\Core\Domain\Abstraction\Interface;


use App\Core\Domain\Abstraction\Interface\IPaginatedRepository;
use App\Core\Domain\Entity\Pedido;

interface IPedidoRepository extends IPaginatedRepository, IGetIdentifiableEntityRepository  {

/**
 * @return Pedido
 */
public function getById($id) : ?Pedido;

}
