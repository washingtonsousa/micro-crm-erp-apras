<?php

namespace App\Core\Domain\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TbCarrierRegion
 *
 * @ORM\Table(name="tb_carrier_region", indexes={@ORM\Index(name="IX_tb_carrier_region_id_carrier", columns={"id_carrier"}), @ORM\Index(name="IX_tb_carrier_region_id_region", columns={"id_region"})})
 * @ORM\Entity
 */
class TbCarrierRegion
{
    /**
     * @var bool
     *
     * @ORM\Column(name="id_carrier_region", type="boolean", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCarrierRegion;

    /**
     * @var float|null
     *
     * @ORM\Column(name="value", type="float", precision=10, scale=0, nullable=true)
     */
    private $value;

    /**
     * @var \TbCarrier
     *
     * @ORM\ManyToOne(targetEntity="TbCarrier")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_carrier", referencedColumnName="id_carrier")
     * })
     */
    private $idCarrier;

    /**
     * @var \TbRegion
     *
     * @ORM\ManyToOne(targetEntity="TbRegion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_region", referencedColumnName="id_region")
     * })
     */
    private $idRegion;

    public function getIdCarrierRegion(): ?bool
    {
        return $this->idCarrierRegion;
    }

    public function getValue(): ?float
    {
        return $this->value;
    }

    public function setValue(?float $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function getIdCarrier(): ?TbCarrier
    {
        return $this->idCarrier;
    }

    public function setIdCarrier(?TbCarrier $idCarrier): self
    {
        $this->idCarrier = $idCarrier;

        return $this;
    }

    public function getIdRegion(): ?TbRegion
    {
        return $this->idRegion;
    }

    public function setIdRegion(?TbRegion $idRegion): self
    {
        $this->idRegion = $idRegion;

        return $this;
    }


}
