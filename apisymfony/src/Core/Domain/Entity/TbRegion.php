<?php

namespace App\Core\Domain\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TbRegion
 *
 * @ORM\Table(name="tb_region")
 * @ORM\Entity
 */
class TbRegion
{
    /**
     * @var bool
     *
     * @ORM\Column(name="id_region", type="boolean", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idRegion;

    /**
     * @var string
     *
     * @ORM\Column(name="postalcode_start", type="string", length=255, nullable=false)
     */
    private $postalcodeStart;

    /**
     * @var string
     *
     * @ORM\Column(name="postalcode_finish", type="string", length=255, nullable=false)
     */
    private $postalcodeFinish;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=true)
     */
    private $description;

    public function getIdRegion(): ?bool
    {
        return $this->idRegion;
    }

    public function getPostalcodeStart(): ?string
    {
        return $this->postalcodeStart;
    }

    public function setPostalcodeStart(string $postalcodeStart): self
    {
        $this->postalcodeStart = $postalcodeStart;

        return $this;
    }

    public function getPostalcodeFinish(): ?string
    {
        return $this->postalcodeFinish;
    }

    public function setPostalcodeFinish(string $postalcodeFinish): self
    {
        $this->postalcodeFinish = $postalcodeFinish;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }


}
