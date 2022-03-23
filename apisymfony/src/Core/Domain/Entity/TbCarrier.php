<?php

namespace App\Core\Domain\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TbCarrier
 *
 * @ORM\Table(name="tb_carrier", uniqueConstraints={@ORM\UniqueConstraint(name="IX_tb_carrier_id_image", columns={"id_image"}), @ORM\UniqueConstraint(name="IX_tb_carrier_id_store", columns={"id_store"})}, indexes={@ORM\Index(name="IX_tb_carrier_id_module", columns={"id_module"})})
 * @ORM\Entity
 */
class TbCarrier
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_carrier", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCarrier;

    /**
     * @var int
     *
     * @ORM\Column(name="carrier_type", type="integer", nullable=false)
     */
    private $carrierType;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="text", length=65535, nullable=true)
     */
    private $name;

    /**
     * @var bool
     *
     * @ORM\Column(name="use_postalcode_delimitations", type="boolean", nullable=false)
     */
    private $usePostalcodeDelimitations;

    /**
     * @var bool
     *
     * @ORM\Column(name="active", type="boolean", nullable=false)
     */
    private $active;

    /**
     * @var float
     *
     * @ORM\Column(name="max_height", type="float", precision=10, scale=0, nullable=false)
     */
    private $maxHeight;

    /**
     * @var float
     *
     * @ORM\Column(name="max_weight", type="float", precision=10, scale=0, nullable=false)
     */
    private $maxWeight;

    /**
     * @var float
     *
     * @ORM\Column(name="max_width", type="float", precision=10, scale=0, nullable=false)
     */
    private $maxWidth;

    /**
     * @var float
     *
     * @ORM\Column(name="max_depth", type="float", precision=10, scale=0, nullable=false)
     */
    private $maxDepth;

    /**
     * @var bool
     *
     * @ORM\Column(name="flag_by_dimensions", type="boolean", nullable=false)
     */
    private $flagByDimensions;

    /**
     * @var bool
     *
     * @ORM\Column(name="flag_by_weight", type="boolean", nullable=false)
     */
    private $flagByWeight;

    /**
     * @var float|null
     *
     * @ORM\Column(name="nu_value", type="float", precision=10, scale=0, nullable=true)
     */
    private $nuValue;

    /**
     * @var \TbStore
     *
     * @ORM\ManyToOne(targetEntity="TbStore")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_store", referencedColumnName="id_store")
     * })
     */
    private $idStore;

    /**
     * @var \TbImage
     *
     * @ORM\ManyToOne(targetEntity="TbImage")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_image", referencedColumnName="id_image")
     * })
     */
    private $idImage;

    /**
     * @var \TbModules
     *
     * @ORM\ManyToOne(targetEntity="TbModules")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_module", referencedColumnName="id_module")
     * })
     */
    private $idModule;

    public function getIdCarrier(): ?int
    {
        return $this->idCarrier;
    }

    public function getCarrierType(): ?int
    {
        return $this->carrierType;
    }

    public function setCarrierType(int $carrierType): self
    {
        $this->carrierType = $carrierType;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getUsePostalcodeDelimitations(): ?bool
    {
        return $this->usePostalcodeDelimitations;
    }

    public function setUsePostalcodeDelimitations(bool $usePostalcodeDelimitations): self
    {
        $this->usePostalcodeDelimitations = $usePostalcodeDelimitations;

        return $this;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getMaxHeight(): ?float
    {
        return $this->maxHeight;
    }

    public function setMaxHeight(float $maxHeight): self
    {
        $this->maxHeight = $maxHeight;

        return $this;
    }

    public function getMaxWeight(): ?float
    {
        return $this->maxWeight;
    }

    public function setMaxWeight(float $maxWeight): self
    {
        $this->maxWeight = $maxWeight;

        return $this;
    }

    public function getMaxWidth(): ?float
    {
        return $this->maxWidth;
    }

    public function setMaxWidth(float $maxWidth): self
    {
        $this->maxWidth = $maxWidth;

        return $this;
    }

    public function getMaxDepth(): ?float
    {
        return $this->maxDepth;
    }

    public function setMaxDepth(float $maxDepth): self
    {
        $this->maxDepth = $maxDepth;

        return $this;
    }

    public function getFlagByDimensions(): ?bool
    {
        return $this->flagByDimensions;
    }

    public function setFlagByDimensions(bool $flagByDimensions): self
    {
        $this->flagByDimensions = $flagByDimensions;

        return $this;
    }

    public function getFlagByWeight(): ?bool
    {
        return $this->flagByWeight;
    }

    public function setFlagByWeight(bool $flagByWeight): self
    {
        $this->flagByWeight = $flagByWeight;

        return $this;
    }

    public function getNuValue(): ?float
    {
        return $this->nuValue;
    }

    public function setNuValue(?float $nuValue): self
    {
        $this->nuValue = $nuValue;

        return $this;
    }

    public function getIdStore(): ?TbStore
    {
        return $this->idStore;
    }

    public function setIdStore(?TbStore $idStore): self
    {
        $this->idStore = $idStore;

        return $this;
    }

    public function getIdImage(): ?TbImage
    {
        return $this->idImage;
    }

    public function setIdImage(?TbImage $idImage): self
    {
        $this->idImage = $idImage;

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
