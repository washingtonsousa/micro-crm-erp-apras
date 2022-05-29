<?php
namespace  App\Core\Application\ViewModel;

use App\Core\Application\Abstraction\ViewModel\EntityViewModel;
use DateTime;

class PedidoProdutoViewModel extends EntityViewModel {

  
    public int $idPedidoProduto;
    public int $quantidade;
    
    public mixed $idProduto;
    public mixed $idPedido;    

    public mixed $produto;
    public mixed $pedido;   

}
