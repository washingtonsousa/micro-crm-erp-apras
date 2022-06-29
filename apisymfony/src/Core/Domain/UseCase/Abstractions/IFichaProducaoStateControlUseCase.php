<?php
namespace App\Core\Domain\UseCase\Abstractions;

use App\Core\Domain\Entity\FichaProducao;

interface IFichaProducaoStateControlUseCase {


 public function  Execute(FichaProducao $ficha) : ?FichaProducao;


}