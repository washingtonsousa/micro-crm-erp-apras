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
    * 
    * @ORM\OneToOne(targetEntity="ClienteImagem", mappedBy="cliente", cascade={"all"})
    */
    public $clienteImagem;

}
