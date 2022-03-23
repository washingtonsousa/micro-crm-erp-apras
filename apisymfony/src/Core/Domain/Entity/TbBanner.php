<?php

namespace App\Core\Domain\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TbBanner
 *
 * @ORM\Table(name="tb_banner", indexes={@ORM\Index(name="fk_banner_image1_idx", columns={"id_image"})})
 * @ORM\Entity
 */
class TbBanner
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_banner", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idBanner;

    /**
     * @var string|null
     *
     * @ORM\Column(name="taget-link", type="string", length=255, nullable=true)
     */
    private $tagetLink;

    /**
     * @var string|null
     *
     * @ORM\Column(name="title", type="string", length=45, nullable=true)
     */
    private $title;

    /**
     * @var \TbImage
     *
     * @ORM\ManyToOne(targetEntity="TbImage")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_image", referencedColumnName="id_image")
     * })
     */
    private $idImage;

    public function getIdBanner(): ?int
    {
        return $this->idBanner;
    }

    public function getTagetLink(): ?string
    {
        return $this->tagetLink;
    }

    public function setTagetLink(?string $tagetLink): self
    {
        $this->tagetLink = $tagetLink;

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

    public function getIdImage(): ?TbImage
    {
        return $this->idImage;
    }

    public function setIdImage(?TbImage $idImage): self
    {
        $this->idImage = $idImage;

        return $this;
    }


}
