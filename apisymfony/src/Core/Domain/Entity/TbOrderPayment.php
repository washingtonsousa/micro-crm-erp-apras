<?php

namespace App\Core\Domain\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TbOrderPayment
 *
 * @ORM\Table(name="tb_order_payment", indexes={@ORM\Index(name="fk_payment_payment_way1_idx", columns={"id_payment_way"}), @ORM\Index(name="IX_tb_order_payment_id_card", columns={"id_card"})})
 * @ORM\Entity
 */
class TbOrderPayment
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_payment", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPayment;

    /**
     * @var int
     *
     * @ORM\Column(name="id_order", type="integer", nullable=false)
     */
    private $idOrder;

    /**
     * @var string|null
     *
     * @ORM\Column(name="url_bill", type="text", length=65535, nullable=true)
     */
    private $urlBill;

    /**
     * @var \TbCreditCard
     *
     * @ORM\ManyToOne(targetEntity="TbCreditCard")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_card", referencedColumnName="id_credit_card")
     * })
     */
    private $idCard;

    /**
     * @var \TbPaymentWay
     *
     * @ORM\ManyToOne(targetEntity="TbPaymentWay")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_payment_way", referencedColumnName="id_payment_way")
     * })
     */
    private $idPaymentWay;

    public function getIdPayment(): ?int
    {
        return $this->idPayment;
    }

    public function getIdOrder(): ?int
    {
        return $this->idOrder;
    }

    public function setIdOrder(int $idOrder): self
    {
        $this->idOrder = $idOrder;

        return $this;
    }

    public function getUrlBill(): ?string
    {
        return $this->urlBill;
    }

    public function setUrlBill(?string $urlBill): self
    {
        $this->urlBill = $urlBill;

        return $this;
    }

    public function getIdCard(): ?TbCreditCard
    {
        return $this->idCard;
    }

    public function setIdCard(?TbCreditCard $idCard): self
    {
        $this->idCard = $idCard;

        return $this;
    }

    public function getIdPaymentWay(): ?TbPaymentWay
    {
        return $this->idPaymentWay;
    }

    public function setIdPaymentWay(?TbPaymentWay $idPaymentWay): self
    {
        $this->idPaymentWay = $idPaymentWay;

        return $this;
    }


}
