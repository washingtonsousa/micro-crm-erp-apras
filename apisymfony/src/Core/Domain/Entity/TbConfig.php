<?php

namespace App\Core\Domain\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TbConfig
 *
 * @ORM\Table(name="tb_config", indexes={@ORM\Index(name="IX_tb_config_id_module", columns={"id_module"})})
 * @ORM\Entity
 */
class TbConfig
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_config", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idConfig;

    /**
     * @var string|null
     *
     * @ORM\Column(name="key", type="string", length=255, nullable=true)
     */
    private $key;

    /**
     * @var string|null
     *
     * @ORM\Column(name="value", type="string", length=255, nullable=true)
     */
    private $value;

    /**
     * @var int
     *
     * @ORM\Column(name="config_type", type="integer", nullable=false)
     */
    private $configType;

    /**
     * @var \TbModules
     *
     * @ORM\ManyToOne(targetEntity="TbModules")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_module", referencedColumnName="id_module")
     * })
     */
    private $idModule;

    public function getIdConfig(): ?int
    {
        return $this->idConfig;
    }

    public function getKey(): ?string
    {
        return $this->key;
    }

    public function setKey(?string $key): self
    {
        $this->key = $key;

        return $this;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(?string $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function getConfigType(): ?int
    {
        return $this->configType;
    }

    public function setConfigType(int $configType): self
    {
        $this->configType = $configType;

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
