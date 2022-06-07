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

    public $idUsuarioCorteSeparacao;

    public $idUsuarioBordadoEstamparia;

    public $idUsuarioCostura;

    public $idUsuarioCadastroFicha;

    public function jsonSerialize() {


      return [
          'idPedidoProduto' => $this->idPedidoProduto,
          'idUsuarioCadastroFicha' => $this->idUsuarioCadastroFicha,
          'dtCadastro' => $this->dtCadastro
      ];
  }

}
