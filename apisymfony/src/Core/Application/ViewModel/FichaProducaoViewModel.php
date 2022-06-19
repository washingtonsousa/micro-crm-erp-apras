<?php
namespace  App\Core\Application\ViewModel;

use App\Core\Application\Abstraction\ViewModel\EntityViewModel;
use DateTime;

class FichaProducaoViewModel extends EntityViewModel   implements \JsonSerializable  {
 
    public $idFichaProducao;

    public $estadoFicha;

    public $qtnProducao;

    public $dtProducao;

    public $dtCorteSeparacao;

    public $qtnCorteSeparacaoPerda;

    public $qtnCorteSeparacao;

    public $dtBordadoEstampa;

    public $qtnBordadoEstampa;

    public $qtnBordadoEstampaPerda;

    public $dtCostura;

    public $qtnCostura;

    public $qtnCosturaPerda;

    public $qtnProduzido;

    public $qtnPerdido;

    public $dtCadastro;

    public $idPedidoProduto;

    public $pedidoProduto;

    public $idUsuarioCorteSeparacao;

    public $usuarioCorteSeparacao;


    public $idUsuarioBordadoEstamparia;

    public $usuarioBordadoEstamparia;


    public $idUsuarioCostura;

    public $usuarioCostura;


    public $idUsuarioCadastroFicha;

    public $usuarioCadastroFicha;


    public function jsonSerialize() {

       if($this->pedidoProduto != null)
           $this->pedidoProduto->fichasProducao = array();

      return [
        'idFichaProducao' => $this->idFichaProducao,

          'idPedidoProduto' => $this->idPedidoProduto,
          'idUsuarioCadastroFicha' => $this->idUsuarioCadastroFicha,
          'dtCadastro' => $this->dtCadastro,
          'qtnProducao' => $this->qtnProducao,
          'usuarioCadastroFicha' => $this->usuarioCadastroFicha,
          'estadoFicha' => $this->estadoFicha,
          'pedidoProduto' => $this->pedidoProduto


      ];
  }

}
