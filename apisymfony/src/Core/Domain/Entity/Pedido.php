<?php

namespace App\Core\Domain\Entity;

use App\Core\Domain\Enum\PedidoStatusEnum;
use App\Core\Shared\Resolver\DependencyResolver;
use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * Pedido
 *
 * @ORM\Table(name="pedido", indexes={@ORM\Index(name="fk_pedido_cliente1_idx", columns={"id_cliente"})})
 * @ORM\Entity
 */
class Pedido
{



    public function __construct()
    {
        $this->dataCriacao = new DateTime();
        $this->status = PedidoStatusEnum::INICIAL;
    }

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
    * @ORM\ManyToOne(targetEntity="Cliente", fetch="LAZY")
    * @ORM\JoinColumn(name="id_cliente", referencedColumnName="id_cliente")
    */
    public $cliente;


    /**
    * @ORM\Column(name="id_cliente", type="integer", nullable=false)
    */
    public $idCliente;


     /**
     * @var \DateTime
     *
     * @ORM\Column(name="dt_criacao", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $dataCriacao;

    /**
    * @ORM\OneToMany(targetEntity="PedidoProduto", mappedBy="pedido", cascade={"all"})
    */
    public $pedidoProdutos;

    public function prepareForInsert() {

        if($this->pedidoProdutos == null)
            $this->pedidoProdutos = [];

        $this->setStatus(PedidoStatusEnum::INICIAL);
        $this->setDataCriacao(new DateTime());

        foreach($this->pedidoProdutos as  $pedidoProduto) {
            $reference = DependencyResolver::make("app.orm")->getManager()->getReference(Produto::class, $pedidoProduto->getIdProduto());
            $pedidoProduto->setProduto($reference);
            $pedidoProduto->setPedido($this);
        }

        $referenceCliente = DependencyResolver::make("app.orm")->getManager()->getReference(Cliente::class, $this->idCliente);
        $this->cliente = $referenceCliente;
        $this->pedidoProdutos;

    }



    /**
     * Set the value of status
     *
     * @param  int  $status
     *
     * @return  self
     */ 
    public function setStatus(int $status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Set the value of dataCriacao
     *
     * @param  \DateTime  $dataCriacao
     *
     * @return  self
     */ 
    public function setDataCriacao(\DateTime $dataCriacao)
    {
        $this->dataCriacao = $dataCriacao;

        return $this;
    }

    /**
     * Get the value of idPedido
     *
     * @return  int
     */ 
    public function getIdPedido()
    {
        return $this->idPedido;
    }
}
