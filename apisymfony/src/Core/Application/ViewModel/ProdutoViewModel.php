<?php
namespace  App\Core\Application\ViewModel;

use App\Core\Application\Abstraction\ViewModel\EntityViewModel;
use DateTime;

class ProdutoViewModel extends EntityViewModel  implements \JsonSerializable {

    public $idProduto;
    public $nome;
    public $cor;
    public $codigoProduto;
    public $tamanho;
    public $descricao;
    public $dtDataCadastro;
    public $produtoImagem;
    public $codigoCliente;

    public function jsonSerialize() {


        return [
            'codigoProduto' => $this->codigoProduto,
            'nome' => $this->nome,
            'idProduto' => $this->idProduto,
            'cor' => $this->cor,
            'tamanho' => $this->tamanho,
            'descricao' => $this->descricao,
            'dtDataCadastro' => $this->dtDataCadastro,
            'produtoImagem' => $this->produtoImagem,
            'codigoCliente' => $this->codigoCliente
        ];
    }

}
