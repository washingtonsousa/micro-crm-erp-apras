<?php
namespace App\Core\Domain\Abstraction\Interface;


use App\Core\Domain\Abstraction\Interface\IPaginatedRepository;
use App\Core\Domain\Entity\FichaProducao;
use App\Core\Domain\Entity\Pedido;

interface IFichaProducaoRepository extends IPaginatedRepository, IGetIdentifiableEntityRepository  {

/**
 * @return FichaProducao
 */
public function getById($id) : ?FichaProducao;

}
