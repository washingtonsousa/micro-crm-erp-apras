<?php
namespace  App\Core\Application\ViewModel;

use App\Core\Application\Abstraction\ViewModel\EntityViewModel;
use DateTime;

class ClienteImagemViewModel extends EntityViewModel implements \JsonSerializable {

    public $idClienteImagem;
    public $idCliente;  
    public $idImagem;
    public $cliente;  
    public $imagem;

    public function jsonSerialize() {

        // On One To One Recursion may happen

        if($this->cliente != null)
        $this->cliente->clienteImagem = null;

        if($this->imagem != null)
        $this->imagem->clienteImagem = null;

        return [
            'idClienteImagem' => $this->idClienteImagem,
            'idCliente' => $this->idCliente,
            'idImagem' => $this->idImagem,
            'imagem' => $this->imagem,
            'cliente' => $this->cliente,

        ];
    }

  
}
