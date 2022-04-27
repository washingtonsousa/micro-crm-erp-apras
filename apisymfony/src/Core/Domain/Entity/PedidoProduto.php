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


}
