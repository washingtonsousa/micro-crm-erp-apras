<?php

namespace App\Core\Domain\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PacoteEstoqueCliente
 *
 * @ORM\Table(name="pacote_estoque_cliente", indexes={@ORM\Index(name="fk_pacote_estoque_cliente_ficha_producao1_idx", columns={"id_ficha_producao"}), @ORM\Index(name="fk_pacote_estoque_cliente_usuario1_idx", columns={"id_usuario_envio"})})
 * @ORM\Entity
 */
class PacoteEstoqueCliente
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_pacote_estoque_cliente", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPacoteEstoqueCliente;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dt_envio", type="datetime", nullable=true)
     */
    private $dtEnvio;

    /**
     * @var \FichaProducao
     *
     * @ORM\ManyToOne(targetEntity="FichaProducao")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_ficha_producao", referencedColumnName="id_ficha_producao")
     * })
     */
    private $idFichaProducao;

    /**
     * @var \Usuario
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_usuario_envio", referencedColumnName="id_usuario")
     * })
     */
    private $idUsuarioEnvio;


}
