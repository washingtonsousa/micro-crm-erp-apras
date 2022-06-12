<?php

namespace App\Core\Domain\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cliente
 *
 * @ORM\Table(name="cliente")
 * @ORM\Entity
 */
class Cliente
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_cliente", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    public $idCliente;

    /**
     * @var string
     *
     * @ORM\Column(name="str_nome", type="string", length=255, nullable=false)
     */
    public $strNome;

      /**
     * @var string
     *
     * @ORM\Column(name="cod_cliente", type="string", length=255, nullable=false)
     */
    public $codigoCliente = '0';

    /**
    * 
    * @ORM\OneToOne(targetEntity="ClienteImagem", mappedBy="cliente", cascade={"all"})
    */
    public $clienteImagem;

    /**
    *  @ORM\OneToMany(targetEntity="Pedido", mappedBy="cliente", cascade={"all"}, indexBy="idCliente")
    */
    private $pedidos;

    /**
     * Get the value of idCliente
     *
     * @return  int
     */ 
    public function getIdCliente()
    {
        return $this->idCliente;
    }

    public function fullUpdate(Cliente $cliente) {
        $this->strNome = $cliente->getNome();
    }

    /**
     * Get the value of strNome
     *
     * @return  string
     */ 
    public function getNome()
    {
        return $this->strNome;
    }

    public function __construct()
    {
    }

    /**
     * Set the value of idCliente
     *
     * @param  int  $idCliente
     *
     * @return  self
     */ 
    public function setIdCliente(int $idCliente)
    {
        $this->idCliente = $idCliente;

        return $this;
    }
}
