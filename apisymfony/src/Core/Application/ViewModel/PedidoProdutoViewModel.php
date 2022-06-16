<?php
namespace  App\Core\Application\ViewModel;

use App\Core\Application\Abstraction\ViewModel\EntityViewModel;
use DateTime;

class PedidoProdutoViewModel extends EntityViewModel {

  
    public int $idPedidoProduto;
    public int $quantidade;
    
    public mixed $idProduto;
    public mixed $idPedido;    
    public mixed $fichasProducao = array();
    public mixed $produto;
    public mixed $pedido; 
    
    public function jsonSerialize() {

  
        foreach($this->fichasProducao as $key =>  $fichaProducao) {
            $fichaProducao->pedidoProduto = null;
            $this->fichasProducao[$key] = $fichaProducao;
          }
  
        return [
            'idPedidoProduto' => $this->idPedidoProduto,
            'quantidade' => $this->quantidade,
            'idProduto' => $this->idProduto,
            'idPedido' => $this->idPedido,
            'fichasProducao' => $this->fichasProducao,
            'produto' => $this->produto,
            'pedido' => $this->pedido
        ];
    }

}