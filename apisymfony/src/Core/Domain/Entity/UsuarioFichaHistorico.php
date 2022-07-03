<?php

namespace App\Core\Domain\Entity;

use App\Core\Domain\Enum\FichaProducaoStatusEnum;
use App\Core\Shared\Resolver\DependencyResolver;
use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * UsuarioFichaHistorico
 *
 * @ORM\Table(name="usuario_historico_ficha", indexes={@ORM\Index(name="fk_usuario_historico_idx", columns={"id_usuario"}), @ORM\Index(name="fk_ficha_producao_historico_idx", columns={"id_ficha_producao"})})
 * @ORM\Entity
 */
class UsuarioFichaHistorico
{

    /**
     * @var int
     *
     * @ORM\Column(name="id_usuario_ficha_historico", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    public $idUsuarioFichaHistorico;

    /**
     * @var int
     *
     * @ORM\Column(name="estado_ficha", type="integer", nullable=false)
     */
    public $estadoFicha = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dt_historico", type="datetime", nullable=false)
     */
    public $dtHistorico;

    /**
     * @var \FichaProducao
     *
     * @ORM\ManyToOne(targetEntity="FichaProducao")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_ficha_producao", referencedColumnName="id_ficha_producao")
     * })
     */
    public $fichaProducao;


    /**
     * @var int
     *
     * @ORM\Column(name="id_ficha_producao", type="integer", nullable=false)
     */
    public $idFichaProducao;


    /**
     * @var int
     *
     * @ORM\Column(name="id_usuario", type="integer", nullable=false)
     */
    public $idUsuario;


    
    /**
     * @var \Usuario
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_usuario", referencedColumnName="id_usuario")
     * })
     */
    public $usuario;

    public function __construct($usuario, $ficha, $estadoFicha)
    {
     
        $this->usuario = $usuario;
        $this->fichaProducao = $ficha;
        $this->estadoFicha = $estadoFicha;
        $this->dtHistorico = new DateTime();

    }

}
