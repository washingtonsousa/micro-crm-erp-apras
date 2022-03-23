<?php

namespace App\Core\Domain\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TbOrderProduct
 *
 * @ORM\Table(name="tb_order_product", indexes={@ORM\Index(name="fk_order_product_Order1_idx", columns={"order_id_order"}), @ORM\Index(name="fk_order_product_product1_idx", columns={"product_id_product"})})
 * @ORM\Entity
 */
class TbOrderProduct
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_order_product", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idOrderProduct;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float", precision=10, scale=0, nullable=false)
     */
    private $price;

    /**
     * @var float
     *
     * @ORM\Column(name="price_promo", type="float", precision=10, scale=0, nullable=false)
     */
    private $pricePromo;

    /**
     * @var int
     *
     * @ORM\Column(name="quantity", type="integer", nullable=false)
     */
    private $quantity;

    /**
     * @var \TbOrder
     *
     * @ORM\ManyToOne(targetEntity="TbOrder")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="order_id_order", referencedColumnName="id_order")
     * })
     */
    private $orderIdOrder;

    /**
     * @var \TbProduct
     *
     * @ORM\ManyToOne(targetEntity="TbProduct")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="product_id_product", referencedColumnName="id_product")
     * })
     */
    private $productIdProduct;

    public function getIdOrderProduct(): ?int
    {
        return $this->idOrderProduct;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getPricePromo(): ?float
    {
        return $this->pricePromo;
    }

    public function setPricePromo(float $pricePromo): self
    {
        $this->pricePromo = $pricePromo;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getOrderIdOrder(): ?TbOrder
    {
        return $this->orderIdOrder;
    }

    public function setOrderIdOrder(?TbOrder $orderIdOrder): self
    {
        $this->orderIdOrder = $orderIdOrder;

        return $this;
    }

    public function getProductIdProduct(): ?TbProduct
    {
        return $this->productIdProduct;
    }

    public function setProductIdProduct(?TbProduct $productIdProduct): self
    {
        $this->productIdProduct = $productIdProduct;

        return $this;
    }


}
