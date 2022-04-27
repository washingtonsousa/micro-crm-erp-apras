<?php

namespace App\Core\Domain\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ClienteImagem
 *
 * @ORM\Table(name="cliente_imagem", indexes={@ORM\Index(name="fk_cliente_imagem_cliente1_idx", columns={"id_cliente"}), @ORM\Index(name="fk_cliente_imagem_imagem1_idx", columns={"id_imagem"})})
 * @ORM\Entity
 */
class ClienteImagem
{
    /**
     * @var int
     *
     * @ORM\Column(name="idcliente_imagem", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idclienteImagem;

    /**
     * @var \Cliente
     *
     * @ORM\ManyToOne(targetEntity="Cliente")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_cliente", referencedColumnName="id_cliente")
     * })
     */
    private $idCliente;

    /**
     * @var \Imagem
     *
     * @ORM\ManyToOne(targetEntity="Imagem")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_imagem", referencedColumnName="id_imagem")
     * })
     */
    private $idImagem;


}
