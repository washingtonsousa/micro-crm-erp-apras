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
    public $idClienteImagem;

    /**
     * @var \Cliente
     *
     * @ORM\ManyToOne(targetEntity="Cliente")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_cliente", referencedColumnName="id_cliente")
     * })
     */
    public $cliente;

    /**
     * @var \Imagem
     *
     * @ORM\ManyToOne(targetEntity="Imagem", cascade={"all"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_imagem", referencedColumnName="id_imagem")
     * })
     */
    public $imagem;



    /**
     * @var int
     * @ORM\Column(name="id_cliente", type="integer", nullable=false)
     */
    public $idCliente;

    /**
     * @var int
     *
     * @ORM\Column(name="id_imagem", type="integer", nullable=false)
     */
    public $idImagem;


    public function __construct($cliente, $imagem)
    {
        $this->imagem = $imagem;
        $this->cliente = $cliente;
    }



    /**
     * Get the value of idCliente
     *
     * @return  \Cliente
     */ 
    public function getIdCliente()
    {
        return $this->cliente;
    }

    /**
     * Get the value of idImagem
     *
     * @return  \Imagem
     */ 
    public function getImagem()
    {
        return $this->imagem;
    }
}
