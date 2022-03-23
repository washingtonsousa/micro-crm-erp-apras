<?php

namespace App\Core\Domain\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TbAddress
 *
 * @ORM\Table(name="tb_address")
 * @ORM\Entity
 */
class TbAddress
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_address", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAddress;

    /**
     * @var string|null
     *
     * @ORM\Column(name="street", type="string", length=255, nullable=true)
     */
    private $street;

    /**
     * @var string|null
     *
     * @ORM\Column(name="number", type="string", length=45, nullable=true)
     */
    private $number;

    /**
     * @var string|null
     *
     * @ORM\Column(name="complement", type="string", length=45, nullable=true)
     */
    private $complement;

    /**
     * @var string|null
     *
     * @ORM\Column(name="postalcode", type="string", length=8, nullable=true)
     */
    private $postalcode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="state", type="string", length=2, nullable=true)
     */
    private $state;

    /**
     * @var string|null
     *
     * @ORM\Column(name="city", type="string", length=255, nullable=true)
     */
    private $city;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_order_carrier", type="integer", nullable=true)
     */
    private $idOrderCarrier;

    /**
     * @var int
     *
     * @ORM\Column(name="address_type", type="integer", nullable=false)
     */
    private $addressType;

    public function getIdAddress(): ?int
    {
        return $this->idAddress;
    }

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function setStreet(?string $street): self
    {
        $this->street = $street;

        return $this;
    }

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(?string $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getComplement(): ?string
    {
        return $this->complement;
    }

    public function setComplement(?string $complement): self
    {
        $this->complement = $complement;

        return $this;
    }

    public function getPostalcode(): ?string
    {
        return $this->postalcode;
    }

    public function setPostalcode(?string $postalcode): self
    {
        $this->postalcode = $postalcode;

        return $this;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(?string $state): self
    {
        $this->state = $state;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getIdOrderCarrier(): ?int
    {
        return $this->idOrderCarrier;
    }

    public function setIdOrderCarrier(?int $idOrderCarrier): self
    {
        $this->idOrderCarrier = $idOrderCarrier;

        return $this;
    }

    public function getAddressType(): ?int
    {
        return $this->addressType;
    }

    public function setAddressType(int $addressType): self
    {
        $this->addressType = $addressType;

        return $this;
    }


}
