<?php
namespace  App\Core\Application\ViewModel;

use App\Core\Application\Abstraction\ViewModel\EntityViewModel;
use DateTime;

class PedidoProdutoViewModel extends EntityViewModel {

  
    public int $idPedidoProduto;
    public int $quantidade;
    public int $idProduto;
    public int $idPedido;    

}
