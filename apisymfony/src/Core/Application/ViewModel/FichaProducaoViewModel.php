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

    public $impressa;

    public array $usuarioFichaHistoricos = array();


    public function jsonSerialize() {

       if($this->pedidoProduto != null) {

           $this->pedidoProduto->fichasProducao = array();
           $this->pedidoProduto->pedido->cliente->clienteImagem = null;
       }

      return [

          'idFichaProducao' => $this->idFichaProducao,
          'idPedidoProduto' => $this->idPedidoProduto,
          'dtCadastro' => $this->dtCadastro,
          'qtnProducao' => $this->qtnProducao,
          'usuarioFichaHistoricos' => $this->usuarioFichaHistoricos,
          'estadoFicha' => $this->estadoFicha,
          'pedidoProduto' => $this->pedidoProduto,
          'dtProducao' => $this->dtProducao,
          'qtnCorteSeparacao' => $this->qtnCorteSeparacao,
          'qtnCorteSeparacaoPerda' => $this->qtnCorteSeparacaoPerda,
          'dtCorteSeparacao' => $this->dtCorteSeparacao,
          'qtnBordadoEstampa' => $this->qtnBordadoEstampa,
          'qtnBordadoEstampaPerda' => $this->qtnBordadoEstampaPerda,
          'dtBordadoEstampa' => $this->dtBordadoEstampa,
          'qtnCostura' => $this->qtnCostura,
          'qtnCosturaPerda' => $this->qtnCosturaPerda,
          'dtCostura' => $this->dtBordadoEstampa,
          'qtnProduzido' => $this->qtnProduzido,
          'qtnPerdido' => $this->qtnPerdido,
          'impressa' => $this->impressa

      ];
  }

}
