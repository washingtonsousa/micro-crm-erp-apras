<?php
namespace  App\Core\Application\ViewModel;

use App\Core\Application\Abstraction\ViewModel\EntityViewModel;
use DateTime;

class ClienteViewModel extends EntityViewModel implements \JsonSerializable {
    
    public $idCliente;
    public $strNome;
    public mixed $clienteImagem;
    public mixed $pedidos;

    public function jsonSerialize() {

        // On One To One Recursion may happen

        if($this->clienteImagem != null)
        $this->clienteImagem->cliente->clienteImagem = null;

        if($this->clienteImagem != null)
        $this->clienteImagem->imagem->clienteImagem = null;

        return [
            'idCliente' => $this->idCliente,
            'strNome' => $this->strNome,
            'clienteImagem' => $this->clienteImagem,
            'pedidos' => $this->pedidos
        ];
    }
}
