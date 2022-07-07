<?php

namespace App\Core\Domain\Enum;

class FichaProducaoStatusEnum {

    const INICIAL = 1;
    
    const EM_CORTE_SEPARACAO = 2;

    const EM_BORDADO_ESTAMPARIA = 3;

    const EM_COSTURA = 4;

    const FINALIZADO = 5;

    const ENVIADO_ESTOQUE = 6;


    const CANCELADA = -1;

}