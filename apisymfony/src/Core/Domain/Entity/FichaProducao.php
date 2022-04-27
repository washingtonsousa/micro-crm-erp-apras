<?php

namespace App\Core\Domain\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FichaProducao
 *
 * @ORM\Table(name="ficha_producao", indexes={@ORM\Index(name="fk_ficha_producao_pedido_produto1_idx", columns={"id_pedido_produto"}), @ORM\Index(name="fk_ficha_producao_usuario1_idx", columns={"id_usuario_corte_separacao"}), @ORM\Index(name="fk_ficha_producao_usuario2_idx", columns={"id_usuario_bordado_estamparia"}), @ORM\Index(name="fk_ficha_producao_usuario3_idx", columns={"id_usuario_costura"}), @ORM\Index(name="fk_ficha_producao_usuario4_idx", columns={"id_usuario_cadastro_ficha"})})
 * @ORM\Entity
 */
class FichaProducao
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_ficha_producao", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idFichaProducao;

    /**
     * @var int
     *
     * @ORM\Column(name="estado_ficha", type="integer", nullable=false)
     */
    private $estadoFicha = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="qtn_producao", type="integer", nullable=false)
     */
    private $qtnProducao;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dt_producao", type="datetime", nullable=false)
     */
    private $dtProducao;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dt_corte_separacao", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $dtCorteSeparacao = 'CURRENT_TIMESTAMP';

    /**
     * @var int|null
     *
     * @ORM\Column(name="qtn_corte_separacao_perda", type="integer", nullable=true)
     */
    private $qtnCorteSeparacaoPerda;

    /**
     * @var int|null
     *
     * @ORM\Column(name="qtn_corte_separacao", type="integer", nullable=true)
     */
    private $qtnCorteSeparacao;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dt_bordado_estampa", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $dtBordadoEstampa = 'CURRENT_TIMESTAMP';

    /**
     * @var int|null
     *
     * @ORM\Column(name="qtn_bordado_estampa", type="integer", nullable=true)
     */
    private $qtnBordadoEstampa;

    /**
     * @var int|null
     *
     * @ORM\Column(name="qtn_bordado_estampa_perda", type="integer", nullable=true)
     */
    private $qtnBordadoEstampaPerda;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dt_costura", type="datetime", nullable=true)
     */
    private $dtCostura;

    /**
     * @var int|null
     *
     * @ORM\Column(name="qtn_costura", type="integer", nullable=true)
     */
    private $qtnCostura;

    /**
     * @var int|null
     *
     * @ORM\Column(name="qtn_costura_perda", type="integer", nullable=true)
     */
    private $qtnCosturaPerda;

    /**
     * @var int|null
     *
     * @ORM\Column(name="qtn_produzido", type="integer", nullable=true)
     */
    private $qtnProduzido;

    /**
     * @var int|null
     *
     * @ORM\Column(name="qtn_perdido", type="integer", nullable=true)
     */
    private $qtnPerdido;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dt_cadastro", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $dtCadastro = 'CURRENT_TIMESTAMP';

    /**
     * @var \PedidoProduto
     *
     * @ORM\ManyToOne(targetEntity="PedidoProduto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_pedido_produto", referencedColumnName="id_pedido_produto")
     * })
     */
    private $idPedidoProduto;

    /**
     * @var \Usuario
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_usuario_corte_separacao", referencedColumnName="id_usuario")
     * })
     */
    private $idUsuarioCorteSeparacao;

    /**
     * @var \Usuario
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_usuario_bordado_estamparia", referencedColumnName="id_usuario")
     * })
     */
    private $idUsuarioBordadoEstamparia;

    /**
     * @var \Usuario
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_usuario_costura", referencedColumnName="id_usuario")
     * })
     */
    private $idUsuarioCostura;

    /**
     * @var \Usuario
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_usuario_cadastro_ficha", referencedColumnName="id_usuario")
     * })
     */
    private $idUsuarioCadastroFicha;


}
