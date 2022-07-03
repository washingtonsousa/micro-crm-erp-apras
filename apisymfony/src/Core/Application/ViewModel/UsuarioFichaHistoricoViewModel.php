<?php

namespace  App\Core\Application\ViewModel;

use App\Core\Domain\Enum\FichaProducaoStatusEnum;
use App\Core\Shared\Resolver\DependencyResolver;
use DateTime;
use Doctrine\ORM\Mapping as ORM;


class UsuarioFichaHistoricoViewModel
{

    public $idUsuarioFichaHistorico;

    
    public $estadoFicha;


    public $dtHistorico;

 
    public $fichaProducao;


    public $idFichaProducao;


    public $idUsuario;



    public $usuario;



}
