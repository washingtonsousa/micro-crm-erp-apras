<?php

namespace App\Core\Domain\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pedido
 *
 * @ORM\Table(name="pedido", indexes={@ORM\Index(name="fk_pedido_cliente1_idx", columns={"id_cliente"}), @ORM\Index(name="fk_pedido_pedido_produto1_idx", columns={"id_pedido_produto"})})
 * @ORM\Entity
 */
class Pedido
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_pedido", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPedido;

    /**
     * @var int
     *
     * @ORM\Column(name="status", type="integer", nullable=false)
     */
    private $status;

    /**
     * @var string|null
     *
     * @ORM\Column(name="txt_observacoes", type="text", length=65535, nullable=true)
     */
    private $txtObservacoes;

    /**
     * @var \Cliente
     *
     * @ORM\ManyToOne(targetEntity="Cliente")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_cliente", referencedColumnName="id_cliente")
     * })
     */
    private $idCliente;


}
