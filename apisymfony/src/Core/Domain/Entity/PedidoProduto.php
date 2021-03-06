<?php

namespace App\Core\Domain\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PedidoProduto
 *
 * @ORM\Table(name="pedido_produto")
 * @ORM\Entity
 */
class PedidoProduto
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_pedido_produto", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    public $idPedidoProduto;

    /**
     * @var int|null
     *
     * @ORM\Column(name="quantidade", type="integer", nullable=true)
     */
    public $quantidade;

    /**
     * @var int
     * @ORM\Column(name="id_produto", type="integer", nullable=false)
     */
    public $idProduto;

    /**
     * @var int
     *
     * @ORM\Column(name="id_pedido", type="integer", nullable=false)
     */
    public $idPedido;


    /**
     * @var string|null
     *
     * @ORM\Column(name="tamanho", type="string", length=255, nullable=true)
     */
    public $tamanho;

    /**
     * @ORM\ManyToOne(targetEntity="Produto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_produto", referencedColumnName="id_produto")
     * })
     */
    public $produto;

    /**
     * @ORM\ManyToOne(targetEntity="Pedido")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_pedido", referencedColumnName="id_pedido")
     * })
     */
    public $pedido;

    /**
     *@ORM\OneToMany(targetEntity="FichaProducao", mappedBy="pedidoProduto", cascade={"all"})
     */
    public $fichasProducao;


    /**
     * Set })
     *
     * @return  self
     */ 
    public function setProduto($produto)
    {
        $this->produto = $produto;

        return $this;
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

    /**
     * Set })
     *
     * @return  self
     */ 
    public function setPedido($pedido)
    {
        $this->pedido = $pedido;

        return $this;
    }

    /**
     * Get the value of idPedido
     *
     * @return  int
     */ 
    public function getIdPedido()
    {
        return $this->idPedido;
    }

    /**
     * Get })
     */ 
    public function getProduto()
    {
        return $this->produto;
    }

    /**
     * Get the value of idPedidoProduto
     *
     * @return  int
     */ 
    public function getIdPedidoProduto()
    {
        return $this->idPedidoProduto;
    }
}
