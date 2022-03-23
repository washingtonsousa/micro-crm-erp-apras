<?php

namespace App\Core\Domain\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TbOrder
 *
 * @ORM\Table(name="tb_order", uniqueConstraints={@ORM\UniqueConstraint(name="fk_order_payment1_idx", columns={"id_payment"})}, indexes={@ORM\Index(name="fk_order_carrier1_idx", columns={"id_order_carrier"}), @ORM\Index(name="fk_order_Customer1_idx", columns={"id_customer"})})
 * @ORM\Entity
 */
class TbOrder
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_order", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idOrder;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_order_carrier", type="integer", nullable=true)
     */
    private $idOrderCarrier;

    /**
     * @var int
     *
     * @ORM\Column(name="id_status_order", type="integer", nullable=false)
     */
    private $idStatusOrder;

    /**
     * @var float|null
     *
     * @ORM\Column(name="total", type="float", precision=10, scale=0, nullable=true)
     */
    private $total;

    /**
     * @var float|null
     *
     * @ORM\Column(name="discount", type="float", precision=10, scale=0, nullable=true)
     */
    private $discount;

    /**
     * @var float|null
     *
     * @ORM\Column(name="sub_total", type="float", precision=10, scale=0, nullable=true)
     */
    private $subTotal;

    /**
     * @var int
     *
     * @ORM\Column(name="status_order", type="integer", nullable=false)
     */
    private $statusOrder;

    /**
     * @var \TbCustomer
     *
     * @ORM\ManyToOne(targetEntity="TbCustomer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_customer", referencedColumnName="id_customer")
     * })
     */
    private $idCustomer;

    /**
     * @var \TbOrderPayment
     *
     * @ORM\ManyToOne(targetEntity="TbOrderPayment")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_payment", referencedColumnName="id_payment")
     * })
     */
    private $idPayment;

    public function getIdOrder(): ?int
    {
        return $this->idOrder;
    }

    public function getIdOrderCarrier(): ?int
    {
        return $this->idOrderCarrier;
    }

    public function setIdOrderCarrier(?int $idOrderCarrier): self
    {
        $this->idOrderCarrier = $idOrderCarrier;

        return $this;
    }

    public function getIdStatusOrder(): ?int
    {
        return $this->idStatusOrder;
    }

    public function setIdStatusOrder(int $idStatusOrder): self
    {
        $this->idStatusOrder = $idStatusOrder;

        return $this;
    }

    public function getTotal(): ?float
    {
        return $this->total;
    }

    public function setTotal(?float $total): self
    {
        $this->total = $total;

        return $this;
    }

    public function getDiscount(): ?float
    {
        return $this->discount;
    }

    public function setDiscount(?float $discount): self
    {
        $this->discount = $discount;

        return $this;
    }

    public function getSubTotal(): ?float
    {
        return $this->subTotal;
    }

    public function setSubTotal(?float $subTotal): self
    {
        $this->subTotal = $subTotal;

        return $this;
    }

    public function getStatusOrder(): ?int
    {
        return $this->statusOrder;
    }

    public function setStatusOrder(int $statusOrder): self
    {
        $this->statusOrder = $statusOrder;

        return $this;
    }

    public function getIdCustomer(): ?TbCustomer
    {
        return $this->idCustomer;
    }

    public function setIdCustomer(?TbCustomer $idCustomer): self
    {
        $this->idCustomer = $idCustomer;

        return $this;
    }

    public function getIdPayment(): ?TbOrderPayment
    {
        return $this->idPayment;
    }

    public function setIdPayment(?TbOrderPayment $idPayment): self
    {
        $this->idPayment = $idPayment;

        return $this;
    }


}
