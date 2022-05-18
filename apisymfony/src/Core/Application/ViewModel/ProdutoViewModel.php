<?php
namespace  App\Core\Application\ViewModel;

use App\Core\Application\Abstraction\ViewModel\EntityViewModel;
use DateTime;

class ProdutoViewModel extends EntityViewModel {

    public $idProduto;
    public $nome;
    public $cor;
    public $codigoProduto;
    public $tamanho;
    public $descricao;
    public $dtDataCadastro;
    public $produtoImagem;

}
