<?php

namespace App\Core\Domain\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TbStore
 *
 * @ORM\Table(name="tb_store", indexes={@ORM\Index(name="fk_store_address1_idx", columns={"id_address"}), @ORM\Index(name="fk_store_image1_idx", columns={"id_logo"})})
 * @ORM\Entity
 */
class TbStore
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_store", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idStore;

    /**
     * @var string|null
     *
     * @ORM\Column(name="legal_name", type="string", length=45, nullable=true)
     */
    private $legalName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=45, nullable=true)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="web_domain", type="string", length=45, nullable=true)
     */
    private $webDomain;

    /**
     * @var string|null
     *
     * @ORM\Column(name="url", type="string", length=45, nullable=true)
     */
    private $url;

    /**
     * @var string|null
     *
     * @ORM\Column(name="store_legal_id", type="string", length=45, nullable=true)
     */
    private $storeLegalId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="title", type="string", length=45, nullable=true)
     */
    private $title;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="ssl", type="boolean", nullable=true)
     */
    private $ssl;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_carrier", type="integer", nullable=true)
     */
    private $idCarrier;

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
     * @var \TbImage
     *
     * @ORM\ManyToOne(targetEntity="TbImage")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_logo", referencedColumnName="id_image")
     * })
     */
    private $idLogo;

    public function getIdStore(): ?int
    {
        return $this->idStore;
    }

    public function getLegalName(): ?string
    {
        return $this->legalName;
    }

    public function setLegalName(?string $legalName): self
    {
        $this->legalName = $legalName;

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

    public function getWebDomain(): ?string
    {
        return $this->webDomain;
    }

    public function setWebDomain(?string $webDomain): self
    {
        $this->webDomain = $webDomain;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getStoreLegalId(): ?string
    {
        return $this->storeLegalId;
    }

    public function setStoreLegalId(?string $storeLegalId): self
    {
        $this->storeLegalId = $storeLegalId;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getSsl(): ?bool
    {
        return $this->ssl;
    }

    public function setSsl(?bool $ssl): self
    {
        $this->ssl = $ssl;

        return $this;
    }

    public function getIdCarrier(): ?int
    {
        return $this->idCarrier;
    }

    public function setIdCarrier(?int $idCarrier): self
    {
        $this->idCarrier = $idCarrier;

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

    public function getIdLogo(): ?TbImage
    {
        return $this->idLogo;
    }

    public function setIdLogo(?TbImage $idLogo): self
    {
        $this->idLogo = $idLogo;

        return $this;
    }


}
