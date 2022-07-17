<?php

namespace App\Core\Domain\Entity;

use App\Core\Domain\Enum\FichaProducaoStatusEnum;
use App\Core\Shared\Resolver\DependencyResolver;
use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * FichaProducao
 *
 * @ORM\Table(name="ficha_producao")
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
    public $idFichaProducao;

    /**
     * @var int
     *
     * @ORM\Column(name="estado_ficha", type="integer", nullable=false)
     */
    public $estadoFicha = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="qtn_producao", type="integer", nullable=false)
     */
    public $qtnProducao;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dt_producao", type="datetime", nullable=true)
     */
    public $dtProducao;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dt_corte_separacao", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    public $dtCorteSeparacao;

    /**
     * @var int|null
     *
     * @ORM\Column(name="qtn_corte_separacao_perda", type="integer", nullable=true)
     */
    public $qtnCorteSeparacaoPerda;

    /**
     * @var int|null
     *
     * @ORM\Column(name="qtn_corte_separacao", type="integer", nullable=true)
     */
    public $qtnCorteSeparacao;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dt_bordado_estampa", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    public $dtBordadoEstampa;

    /**
     * @var int|null
     *
     * @ORM\Column(name="qtn_bordado_estampa", type="integer", nullable=true)
     */
    public $qtnBordadoEstampa;

    /**
     * @var int|null
     *
     * @ORM\Column(name="qtn_bordado_estampa_perda", type="integer", nullable=true)
     */
    public $qtnBordadoEstampaPerda;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dt_costura", type="datetime", nullable=true)
     */
    public $dtCostura;

    /**
     * @var int|null
     *
     * @ORM\Column(name="qtn_costura", type="integer", nullable=true)
     */
    public $qtnCostura;

    /**
     * @var int|null
     *
     * @ORM\Column(name="qtn_costura_perda", type="integer", nullable=true)
     */
    public $qtnCosturaPerda;

    /**
     * @var int|null
     *
     * @ORM\Column(name="qtn_produzido", type="integer", nullable=true)
     */
    public $qtnProduzido;


    /**
     * @var int
     *
     * @ORM\Column(name="impressa", type="integer", nullable=false)
     */
    public $impressa = 0;



    /**
     * @var int|null
     *
     * @ORM\Column(name="qtn_perdido", type="integer", nullable=true)
     */
    public $qtnPerdido;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dt_cadastro", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    public $dtCadastro;

    /**
     * @var \PedidoProduto
     *
     * @ORM\ManyToOne(targetEntity="PedidoProduto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_pedido_produto", referencedColumnName="id_pedido_produto")
     * })
     */
    public $pedidoProduto;


     /**
     * @var int
     *
     * @ORM\Column(name="id_pedido_produto", type="integer", nullable=false)
     */
    public $idPedidoProduto;

    /**
     * 
     * @ORM\OneToMany(targetEntity="UsuarioFichaHistorico", mappedBy="fichaProducao", cascade={"all"})
     */
    public $usuarioFichaHistoricos;


    public function prepareForInsert($idUsuarioCadastro) {

    $manager =  DependencyResolver::make("app.orm")->getManager();
    
    $usuarioCadastroFicha =  $manager->getReference(Usuario::class, $idUsuarioCadastro);
    
    $this->pedidoProduto =  $manager->getReference(PedidoProduto::class, $this->idPedidoProduto);
    $this->estadoFicha = FichaProducaoStatusEnum::INICIAL;
    $this->dtCadastro = new DateTime();

    $this->usuarioFichaHistoricos[] = new UsuarioFichaHistorico($usuarioCadastroFicha, $this, $this->estadoFicha);


    } 
    
    public function setStateAsCorteSeparacao($idUsuario) {

        $manager =  DependencyResolver::make("app.orm")->getManager();
        $this->dtProducao = new DateTime();
        $this->estadoFicha =  FichaProducaoStatusEnum::EM_CORTE_SEPARACAO; 

        $usuarioRecebimentoFicha =  $manager->getReference(Usuario::class, $idUsuario);
        $this->usuarioFichaHistoricos[] = new UsuarioFichaHistorico($usuarioRecebimentoFicha, $this, $this->estadoFicha);

    }

    public function setStateAsBordadoEstamparia($idUsuario) {
        
        $this->estadoFicha =  FichaProducaoStatusEnum::EM_BORDADO_ESTAMPARIA;  

        $manager =  DependencyResolver::make("app.orm")->getManager();
         
        $usuarioEnvioFicha =  $manager->getReference(Usuario::class, $idUsuario);
        $this->usuarioFichaHistoricos[] = new UsuarioFichaHistorico($usuarioEnvioFicha, $this, $this->estadoFicha);

    }

    public function setCorteSeparacaoData(FichaProducao $ficha) {
        $this->dtCorteSeparacao = new DateTime();
        $this->qtnCorteSeparacao = $ficha->qtnCorteSeparacao;
        $this->qtnCorteSeparacaoPerda = $this->qtnProducao - $this->qtnCorteSeparacao;
    }

    public function setBordadoEstampariaData(FichaProducao $ficha) {
        $this->dtBordadoEstampa = new DateTime();
        $this->qtnBordadoEstampa = $ficha->qtnBordadoEstampa;
        $this->qtnBordadoEstampaPerda =  $this->qtnCorteSeparacao - $this->qtnBordadoEstampa;
    }

    public function setStateAsCostura($idUsuario) {

        $this->estadoFicha =  FichaProducaoStatusEnum::EM_COSTURA;    

        $manager =  DependencyResolver::make("app.orm")->getManager();
        $usuarioEnvioFicha =  $manager->getReference(Usuario::class, $idUsuario);
        $this->usuarioFichaHistoricos[] = new UsuarioFichaHistorico($usuarioEnvioFicha, $this, $this->estadoFicha);

  
    }


    public function setStateAsFinalizado($idUsuario) {
        $manager =  DependencyResolver::make("app.orm")->getManager();
        $usuarioEnvioFicha =  $manager->getReference(Usuario::class, $idUsuario);
        $this->usuarioFichaHistoricos[] = new UsuarioFichaHistorico($usuarioEnvioFicha, $this, $this->estadoFicha);

        $this->estadoFicha =  FichaProducaoStatusEnum::FINALIZADO; 
     
    }

    public function setCosturaData(FichaProducao $ficha) {
        $this->dtCostura = new DateTime();
        $this->qtnCostura = $ficha->qtnCostura;
        $this->qtnCosturaPerda = $this->qtnBordadoEstampa - $this->qtnCostura;
    }

    public function setFinalizacaoData() {
        $this->qtnProduzido = $this->qtnCostura;
        $this->qtnPerdido = $this->qtnProducao - $this->qtnProduzido;
    }
    
    /**
     * Get the value of idFichaProducao
     *
     * @return  int
     */ 
    public function getIdFichaProducao()
    {
        return $this->idFichaProducao;
    }

    /**
     * Get the value of estadoFicha
     *
     * @return  int
     */ 
    public function getEstadoFicha()
    {
        return $this->estadoFicha;
    }

    /**
     * Set the value of idFichaProducao
     *
     * @param  int  $idFichaProducao
     *
     * @return  self
     */ 
    public function setIdFichaProducao(int $idFichaProducao)
    {
        $this->idFichaProducao = $idFichaProducao;

        return $this;
    }
}
