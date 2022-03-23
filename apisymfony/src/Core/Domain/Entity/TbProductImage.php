<?php

namespace App\Core\Domain\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TbProductImage
 *
 * @ORM\Table(name="tb_product_image", indexes={@ORM\Index(name="fk_product_image_image1_idx", columns={"id_image"}), @ORM\Index(name="fk_product_image_product1_idx", columns={"id_product"})})
 * @ORM\Entity
 */
class TbProductImage
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_product_image", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idProductImage;

    /**
     * @var bool
     *
     * @ORM\Column(name="fl_principal", type="boolean", nullable=false, options={"default"="b'0'"})
     */
    private $flPrincipal = 'b\'0\'';

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
     * @var \TbProduct
     *
     * @ORM\ManyToOne(targetEntity="TbProduct")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_product", referencedColumnName="id_product")
     * })
     */
    private $idProduct;

    public function getIdProductImage(): ?int
    {
        return $this->idProductImage;
    }

    public function getFlPrincipal(): ?bool
    {
        return $this->flPrincipal;
    }

    public function setFlPrincipal(bool $flPrincipal): self
    {
        $this->flPrincipal = $flPrincipal;

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

    public function getIdProduct(): ?TbProduct
    {
        return $this->idProduct;
    }

    public function setIdProduct(?TbProduct $idProduct): self
    {
        $this->idProduct = $idProduct;

        return $this;
    }


}
