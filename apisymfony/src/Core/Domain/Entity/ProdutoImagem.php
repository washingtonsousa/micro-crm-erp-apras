<?php

namespace App\Core\Domain\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProdutoImagem
 *
 * @ORM\Table(name="produto_imagem", indexes={@ORM\Index(name="fk_produto_imagem_imagem1_idx", columns={"id_imagem"}), @ORM\Index(name="fk_produto_imagem_produto1_idx", columns={"id_produto"})})
 * @ORM\Entity
 */
class ProdutoImagem
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_produto_imagem", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idProdutoImagem;


    /**
     * @var int
     * @ORM\Column(name="id_produto", type="integer", nullable=false)
     */
    public $idProduto;

    /**
     * @var int
     *
     * @ORM\Column(name="id_imagem", type="integer", nullable=false)
     */
    public $idImagem;


    /**
     *
     * @ORM\OneToOne(targetEntity="Imagem", cascade={"all"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_imagem", referencedColumnName="id_imagem")
     * })
     */
    private $imagem;

    /**
     * @var \Produto
     *
     * @ORM\OneToOne(targetEntity="Produto", cascade={"all"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_produto", referencedColumnName="id_produto")
     * })
     */
    private $produto;



    /**
     * Get the value of imagem
     *
     */ 
    public function getImagem() : Imagem
    {
        return $this->imagem;
    }

    /**
     * Get the value of produto
     *
     * @return  \Produto
     */ 
    public function getProduto()
    {
        return $this->produto;
    }


    public function __construct($produto, $imagem)
    {
        $this->imagem = $imagem;
        $this->produto = $produto;

        $this->idProduto = $produto->getIdProduto();
        $this->idImagem = $imagem->getIdImagem();

    }


    /**
     * Get the value of idProduto
     *
     * @return  int
     */ 
    public function getIdProduto()
    {
        return $this->idProduto;
    }

    public function updateImagem(Imagem $imagem) : ProdutoImagem {

        $this->imagem = $imagem;
        return $this;

    }
}
