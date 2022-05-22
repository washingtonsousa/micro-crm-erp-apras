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
     * @var Produto
     *
     * @ORM\ManyToOne(targetEntity="Produto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_produto", referencedColumnName="id_produto")
     * })
     */
    private $produto;


    /**
     * @var int
     *
     * @ORM\Column(name="id_produto", type="integer", nullable=false)
     */
    private $idProduto;

    /**
     *
     * @ORM\Column(name="id_pedido", type="integer", nullable=false)
     */
    private $idPedido;

    /**
     * @var \Pedido
     *
     * @ORM\ManyToOne(targetEntity="Pedido")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_pedido", referencedColumnName="id_pedido")
     * })
     */
    private $pedido;


}
