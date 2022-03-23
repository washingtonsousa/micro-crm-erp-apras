<?php

namespace App\Core\Domain\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TbOrderCarrier
 *
 * @ORM\Table(name="tb_order_carrier", uniqueConstraints={@ORM\UniqueConstraint(name="IX_tb_order_carrier_id_address", columns={"id_address"})}, indexes={@ORM\Index(name="IX_tb_order_carrier_CarrierIdCarrier", columns={"CarrierIdCarrier"})})
 * @ORM\Entity
 */
class TbOrderCarrier
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_order", type="integer", nullable=false)
     */
    private $idOrder;

    /**
     * @var int
     *
     * @ORM\Column(name="id_carrier", type="integer", nullable=false)
     */
    private $idCarrier;

    /**
     * @var float
     *
     * @ORM\Column(name="vl_carrier", type="float", precision=10, scale=0, nullable=false)
     */
    private $vlCarrier;

    /**
     * @var \TbOrder
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="TbOrder")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_order_carrier", referencedColumnName="id_order")
     * })
     */
    private $idOrderCarrier;

    /**
     * @var \TbAddress
     *
     * @ORM\ManyToOne(targetEntity="TbAddress")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_address", referencedColumnName="id_address")
     * })
     */
    private $idAddress;

    /**
     * @var \TbCarrier
     *
     * @ORM\ManyToOne(targetEntity="TbCarrier")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CarrierIdCarrier", referencedColumnName="id_carrier")
     * })
     */
    private $carrieridcarrier;

    public function getIdOrder(): ?int
    {
        return $this->idOrder;
    }

    public function setIdOrder(int $idOrder): self
    {
        $this->idOrder = $idOrder;

        return $this;
    }

    public function getIdCarrier(): ?int
    {
        return $this->idCarrier;
    }

    public function setIdCarrier(int $idCarrier): self
    {
        $this->idCarrier = $idCarrier;

        return $this;
    }

    public function getVlCarrier(): ?float
    {
        return $this->vlCarrier;
    }

    public function setVlCarrier(float $vlCarrier): self
    {
        $this->vlCarrier = $vlCarrier;

        return $this;
    }

    public function getIdOrderCarrier(): ?TbOrder
    {
        return $this->idOrderCarrier;
    }

    public function setIdOrderCarrier(?TbOrder $idOrderCarrier): self
    {
        $this->idOrderCarrier = $idOrderCarrier;

        return $this;
    }

    public function getIdAddress(): ?TbAddress
    {
        return $this->idAddress;
    }

    public function setIdAddress(?TbAddress $idAddress): self
    {
        $this->idAddress = $idAddress;

        return $this;
    }

    public function getCarrieridcarrier(): ?TbCarrier
    {
        return $this->carrieridcarrier;
    }

    public function setCarrieridcarrier(?TbCarrier $carrieridcarrier): self
    {
        $this->carrieridcarrier = $carrieridcarrier;

        return $this;
    }


}
