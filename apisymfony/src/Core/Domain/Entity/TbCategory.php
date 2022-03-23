<?php

namespace App\Core\Domain\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TbCategory
 *
 * @ORM\Table(name="tb_category", indexes={@ORM\Index(name="fk_category_category1_idx", columns={"id_category_parent"})})
 * @ORM\Entity
 */
class TbCategory
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_category", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCategory;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=true)
     */
    private $description;

    /**
     * @var string|null
     *
     * @ORM\Column(name="icon", type="string", length=255, nullable=true)
     */
    private $icon;

    /**
     * @var int
     *
     * @ORM\Column(name="active", type="integer", nullable=false)
     */
    private $active;

    /**
     * @var int|null
     *
     * @ORM\Column(name="orderby", type="integer", nullable=true)
     */
    private $orderby;

    /**
     * @var \TbCategory
     *
     * @ORM\ManyToOne(targetEntity="TbCategory")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_category_parent", referencedColumnName="id_category")
     * })
     */
    private $idCategoryParent;

    public function getIdCategory(): ?int
    {
        return $this->idCategory;
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

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function setIcon(?string $icon): self
    {
        $this->icon = $icon;

        return $this;
    }

    public function getActive(): ?int
    {
        return $this->active;
    }

    public function setActive(int $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getOrderby(): ?int
    {
        return $this->orderby;
    }

    public function setOrderby(?int $orderby): self
    {
        $this->orderby = $orderby;

        return $this;
    }

    public function getIdCategoryParent(): ?self
    {
        return $this->idCategoryParent;
    }

    public function setIdCategoryParent(?self $idCategoryParent): self
    {
        $this->idCategoryParent = $idCategoryParent;

        return $this;
    }


}
