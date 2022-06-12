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
    private $idPedidoProduto;

    /**
     * @var int|null
     *
     * @ORM\Column(name="quantidade", type="integer", nullable=true)
     */
    private $quantidade;

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
     * @ORM\ManyToOne(targetEntity="Produto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_produto", referencedColumnName="id_produto")
     * })
     */
    private $produto;

    /**
     * @ORM\ManyToOne(targetEntity="Pedido")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_pedido", referencedColumnName="id_pedido")
     * })
     */
    private $pedido;

    /**
     *@ORM\OneToMany(targetEntity="FichaProducao", mappedBy="pedidoProduto", cascade={"all"})
     */
    private $fichasproducao;


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
}
