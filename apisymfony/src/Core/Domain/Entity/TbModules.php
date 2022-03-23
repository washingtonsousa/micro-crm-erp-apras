<?php

namespace App\Core\Domain\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TbModules
 *
 * @ORM\Table(name="tb_modules")
 * @ORM\Entity
 */
class TbModules
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_module", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idModule;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="text", length=65535, nullable=true)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="package_name", type="text", length=65535, nullable=true)
     */
    private $packageName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=true)
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\Column(name="is_activated", type="integer", nullable=false)
     */
    private $isActivated;

    /**
     * @var int
     *
     * @ORM\Column(name="module_type", type="integer", nullable=false)
     */
    private $moduleType;

     /**
     * @var string
     *
     * @ORM\Column(name="module_custom_path", type="text", nullable=true)
     */
    private $moduleCustomDir;

    public function getIdModule(): ?int
    {
        return $this->idModule;
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

    public function getPackageName(): ?string
    {
        return $this->packageName;
    }

    public function setPackageName(?string $packageName): self
    {
        $this->packageName = $packageName;

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

    public function getIsActivated(): ?int
    {
        return $this->isActivated;
    }

    public function setIsActivated(int $isActivated): self
    {
        $this->isActivated = $isActivated;

        return $this;
    }

    public function getModuleType(): ?int
    {
        return $this->moduleType;
    }

    public function setModuleType(int $moduleType): self
    {
        $this->moduleType = $moduleType;

        return $this;
    }

    public function getModuleCustomDir(): ?string
    {
        return $this->moduleCustomDir;
    }

    public function setModuleCustomDir(?string $moduleCustomDir): self
    {
        $this->moduleCustomDir = $moduleCustomDir;

        return $this;
    }

}
