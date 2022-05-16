<?php
namespace  App\Core\Application\ViewModel;

use App\Core\Application\Abstraction\ViewModel\EntityViewModel;
use DateTime;

class ClienteViewModel extends EntityViewModel {
    
    public $idCliente;
    public $strNome;
    public mixed $clienteImagens;
}
