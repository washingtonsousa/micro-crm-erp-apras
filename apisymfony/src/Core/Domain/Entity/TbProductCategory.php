<?php

namespace App\Core\Domain\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TbProductCategory
 *
 * @ORM\Table(name="tb_product_category", indexes={@ORM\Index(name="fk_product_category_category_idx", columns={"id_category"}), @ORM\Index(name="fk_product_category_product1_idx", columns={"id_product"})})
 * @ORM\Entity
 */
class TbProductCategory
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_product_category", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idProductCategory;

    /**
     * @var \TbCategory
     *
     * @ORM\ManyToOne(targetEntity="TbCategory")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_category", referencedColumnName="id_category")
     * })
     */
    private $idCategory;

    /**
     * @var \TbProduct
     *
     * @ORM\ManyToOne(targetEntity="TbProduct")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_product", referencedColumnName="id_product")
     * })
     */
    private $idProduct;

    public function getIdProductCategory(): ?int
    {
        return $this->idProductCategory;
    }

    public function getIdCategory(): ?TbCategory
    {
        return $this->idCategory;
    }

    public function setIdCategory(?TbCategory $idCategory): self
    {
        $this->idCategory = $idCategory;

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
