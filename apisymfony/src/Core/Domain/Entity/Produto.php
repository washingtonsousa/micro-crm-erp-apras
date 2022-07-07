<?php

namespace App\Core\Domain\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Produto
 *
 * @ORM\Table(name="produto")
 * @ORM\Entity
 */
class Produto
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_produto", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idProduto;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nome", type="string", length=255, nullable=true)
     */
    private $nome;


    /**
    * @var string
    *
    * @ORM\Column(name="codigo_produto", type="string", length=255, nullable=false)
    */
     public $codigoProduto;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cor", type="string", length=255, nullable=true)
     */
    private $cor;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tamanho", type="string", length=255, nullable=true)
     */
    private $tamanho;

    /**
     * @var string|null
     *
     * @ORM\Column(name="descricao", type="string", length=255, nullable=true)
     */
    private $descricao;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dt_data_cadastro", type="datetime", nullable=true)
     */
    private $dtDataCadastro;

     /**
     * 
     * @ORM\OneToOne(targetEntity="ProdutoImagem", mappedBy="produto", cascade={"all"})
     */
    private $produtoImagem;

     /**
     * @var string
     *
     * @ORM\Column(name="cod_cliente", type="string", nullable=true)
     */
    private $codigoCliente;

    /**
     * Get the value of idProduto
     *
     * @return  int
     */ 
    public function getIdProduto()
    {
        return $this->idProduto;
    }
    
    public function fullUpdate(Produto $produto) {
        $this->codigoProduto = $produto->codigoProduto;
        $this->codigoCliente = $produto->codigoCliente;
        $this->nome = $produto->nome;
        $this->tamanho = $produto->tamanho;
        $this->cor = $produto->cor;
    }
}
