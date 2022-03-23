<?php

namespace App\Core\Domain\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TbPaymentWay
 *
 * @ORM\Table(name="tb_payment_way", indexes={@ORM\Index(name="IX_tb_payment_way_id_module", columns={"id_module"})})
 * @ORM\Entity
 */
class TbPaymentWay
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_payment_way", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPaymentWay;

    /**
     * @var string|null
     *
     * @ORM\Column(name="payment_way", type="string", length=255, nullable=true)
     */
    private $paymentWay;

    /**
     * @var int
     *
     * @ORM\Column(name="payment_type", type="integer", nullable=false)
     */
    private $paymentType;

    /**
     * @var \TbModules
     *
     * @ORM\ManyToOne(targetEntity="TbModules")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_module", referencedColumnName="id_module")
     * })
     */
    private $idModule;

    public function getIdPaymentWay(): ?int
    {
        return $this->idPaymentWay;
    }

    public function getPaymentWay(): ?string
    {
        return $this->paymentWay;
    }

    public function setPaymentWay(?string $paymentWay): self
    {
        $this->paymentWay = $paymentWay;

        return $this;
    }

    public function getPaymentType(): ?int
    {
        return $this->paymentType;
    }

    public function setPaymentType(int $paymentType): self
    {
        $this->paymentType = $paymentType;

        return $this;
    }

    public function getIdModule(): ?TbModules
    {
        return $this->idModule;
    }

    public function setIdModule(?TbModules $idModule): self
    {
        $this->idModule = $idModule;

        return $this;
    }


}
