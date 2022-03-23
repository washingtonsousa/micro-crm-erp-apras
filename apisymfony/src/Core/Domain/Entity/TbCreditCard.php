<?php

namespace App\Core\Domain\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TbCreditCard
 *
 * @ORM\Table(name="tb_credit_card", indexes={@ORM\Index(name="IX_tb_credit_card_id_customer", columns={"id_customer"})})
 * @ORM\Entity
 */
class TbCreditCard
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_credit_card", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCreditCard;

    /**
     * @var string|null
     *
     * @ORM\Column(name="key_card_gtw", type="text", length=65535, nullable=true)
     */
    private $keyCardGtw;

    /**
     * @var string|null
     *
     * @ORM\Column(name="number", type="text", length=65535, nullable=true)
     */
    private $number;

    /**
     * @var int
     *
     * @ORM\Column(name="security_code", type="integer", nullable=false)
     */
    private $securityCode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="owner", type="text", length=65535, nullable=true)
     */
    private $owner;

    /**
     * @var int
     *
     * @ORM\Column(name="creditcard_flag", type="integer", nullable=false)
     */
    private $creditcardFlag;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="expiration_date", type="datetime", nullable=false)
     */
    private $expirationDate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=true)
     */
    private $description;

    /**
     * @var \TbCustomer
     *
     * @ORM\ManyToOne(targetEntity="TbCustomer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_customer", referencedColumnName="id_customer")
     * })
     */
    private $idCustomer;

    public function getIdCreditCard(): ?int
    {
        return $this->idCreditCard;
    }

    public function getKeyCardGtw(): ?string
    {
        return $this->keyCardGtw;
    }

    public function setKeyCardGtw(?string $keyCardGtw): self
    {
        $this->keyCardGtw = $keyCardGtw;

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

    public function getSecurityCode(): ?int
    {
        return $this->securityCode;
    }

    public function setSecurityCode(int $securityCode): self
    {
        $this->securityCode = $securityCode;

        return $this;
    }

    public function getOwner(): ?string
    {
        return $this->owner;
    }

    public function setOwner(?string $owner): self
    {
        $this->owner = $owner;

        return $this;
    }

    public function getCreditcardFlag(): ?int
    {
        return $this->creditcardFlag;
    }

    public function setCreditcardFlag(int $creditcardFlag): self
    {
        $this->creditcardFlag = $creditcardFlag;

        return $this;
    }

    public function getExpirationDate(): ?\DateTimeInterface
    {
        return $this->expirationDate;
    }

    public function setExpirationDate(\DateTimeInterface $expirationDate): self
    {
        $this->expirationDate = $expirationDate;

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
