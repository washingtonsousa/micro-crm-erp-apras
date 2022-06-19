<?php
namespace App\Core\Domain\UseCase\Abstractions;

use App\Core\Domain\Entity\FichaProducao;

interface ICreateFichaProducaoUseCase {


 public function  Execute(FichaProducao $ficha) : ?FichaProducao;


}