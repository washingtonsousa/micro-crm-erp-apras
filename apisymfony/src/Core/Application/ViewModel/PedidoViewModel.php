<?php
namespace  App\Core\Application\ViewModel;

use App\Core\Application\Abstraction\ViewModel\EntityViewModel;
use DateTime;

class PedidoViewModel extends EntityViewModel   implements \JsonSerializable  {


    public $idPedido;
    public $txtObservacoes;
    public $dataCriacao;
    public int $idCliente;
    public $status;


    
      /**
     * @var ClienteViewModel | null 
     *
     */
    public $cliente;



      /**
     * @var PedidoProdutoViewModel[] | null 
     *
     */
    public mixed $pedidoProdutos;


    public function jsonSerialize() {


      foreach($this->pedidoProdutos as $key =>  $pedidoProduto) {

        $pedidoProduto->produto->pedidoProdutos = null;
        $pedidoProduto->pedido = null;
        $pedidoProduto->produto->pedidoProdutos = null;
        $this->pedidoProdutos[$key] = $pedidoProduto;
      }

      $this->cliente->clienteImagem = null;
      $this->cliente->pedidos = null;


      return [
          'idPedido' => $this->idPedido,
          'txtObservacoes' => $this->txtObservacoes,
          'pedidoProdutos' => $this->pedidoProdutos,
          'idCliente' => $this->idCliente,
          'status' => $this->status,
          'cliente' => $this->cliente,
          'dataCriacao' => $this->dataCriacao
      ];
  }

}
