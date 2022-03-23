<?php

namespace App\Core\Domain\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TbCustomerAddress
 *
 * @ORM\Table(name="tb_customer_address", indexes={@ORM\Index(name="fk_customer_address_address1_idx", columns={"id_address"}), @ORM\Index(name="fk_customer_address_Customer1_idx", columns={"id_customer"})})
 * @ORM\Entity
 */
class TbCustomerAddress
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_customer_address", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCustomerAddress;

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
     * @var \TbCustomer
     *
     * @ORM\ManyToOne(targetEntity="TbCustomer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_customer", referencedColumnName="id_customer")
     * })
     */
    private $idCustomer;

    public function getIdCustomerAddress(): ?int
    {
        return $this->idCustomerAddress;
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

    public function getIdCustomer(): ?TbCustomer
    {
        return $this->idCustomer;
    }

    public function setIdCustomer(?TbCustomer $idCustomer): self
    {
        $this->idCustomer = $idCustomer;

        return $this;
    }


}
