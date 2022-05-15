<?php
namespace  App\Core\Application\ViewModel;

use App\Core\Application\Abstraction\ViewModel\EntityViewModel;
use DateTime;

class PedidoViewModel extends EntityViewModel {

    /**
     * @var int
     *
    */
    public $idPedido;

    public $txtObservacoes;

    /**
     * @var ClienteViewModel
     *
     */
    public ClienteViewModel $idCliente;

    
    /**
     * @var PedidoProdutoViewModel[]
     *
     */
    public mixed $produtos;

}
