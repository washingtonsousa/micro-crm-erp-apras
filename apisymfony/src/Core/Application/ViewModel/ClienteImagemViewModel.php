<?php
namespace  App\Core\Application\ViewModel;

use App\Core\Application\Abstraction\ViewModel\EntityViewModel;
use DateTime;

class ClienteImagemViewModel extends EntityViewModel {

    public $idClienteImagem;
    public $idCliente;  
    public $idImagem;
    public $cliente;  
    public $imagem;
}
