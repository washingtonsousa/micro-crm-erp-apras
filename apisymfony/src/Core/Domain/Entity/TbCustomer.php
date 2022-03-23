<?php

namespace App\Core\Domain\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TbCustomer
 *
 * @ORM\Table(name="tb_customer", uniqueConstraints={@ORM\UniqueConstraint(name="email_UNIQUE", columns={"email"})})
 * @ORM\Entity
 */
class TbCustomer
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_customer", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCustomer;

    /**
     * @var int
     *
     * @ORM\Column(name="status", type="integer", nullable=false)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="name_social_legal_id", type="string", length=255, nullable=false)
     */
    private $nameSocialLegalId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="legal_name", type="text", length=65535, nullable=true)
     */
    private $legalName;

    /**
     * @var string
     *
     * @ORM\Column(name="person_type", type="string", length=45, nullable=false)
     */
    private $personType;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthday_foundation", type="date", nullable=false)
     */
    private $birthdayFoundation;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tax_category", type="string", length=45, nullable=true)
     */
    private $taxCategory;

    /**
     * @var string
     *
     * @ORM\Column(name="documment", type="string", length=45, nullable=false)
     */
    private $documment;

    /**
     * @var string|null
     *
     * @ORM\Column(name="social_id", type="string", length=45, nullable=true)
     */
    private $socialId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="state_tax_control_number", type="string", length=45, nullable=true)
     */
    private $stateTaxControlNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="phone_primary", type="string", length=45, nullable=false)
     */
    private $phonePrimary;

    /**
     * @var string|null
     *
     * @ORM\Column(name="phone_secondary", type="string", length=45, nullable=true)
     */
    private $phoneSecondary;

    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string", length=1, nullable=false)
     */
    private $gender;

    public function getIdCustomer(): ?int
    {
        return $this->idCustomer;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(int $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getNameSocialLegalId(): ?string
    {
        return $this->nameSocialLegalId;
    }

    public function setNameSocialLegalId(string $nameSocialLegalId): self
    {
        $this->nameSocialLegalId = $nameSocialLegalId;

        return $this;
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

    public function getPersonType(): ?string
    {
        return $this->personType;
    }

    public function setPersonType(string $personType): self
    {
        $this->personType = $personType;

        return $this;
    }

    public function getBirthdayFoundation(): ?\DateTimeInterface
    {
        return $this->birthdayFoundation;
    }

    public function setBirthdayFoundation(\DateTimeInterface $birthdayFoundation): self
    {
        $this->birthdayFoundation = $birthdayFoundation;

        return $this;
    }

    public function getTaxCategory(): ?string
    {
        return $this->taxCategory;
    }

    public function setTaxCategory(?string $taxCategory): self
    {
        $this->taxCategory = $taxCategory;

        return $this;
    }

    public function getDocumment(): ?string
    {
        return $this->documment;
    }

    public function setDocumment(string $documment): self
    {
        $this->documment = $documment;

        return $this;
    }

    public function getSocialId(): ?string
    {
        return $this->socialId;
    }

    public function setSocialId(?string $socialId): self
    {
        $this->socialId = $socialId;

        return $this;
    }

    public function getStateTaxControlNumber(): ?string
    {
        return $this->stateTaxControlNumber;
    }

    public function setStateTaxControlNumber(?string $stateTaxControlNumber): self
    {
        $this->stateTaxControlNumber = $stateTaxControlNumber;

        return $this;
    }

    public function getPhonePrimary(): ?string
    {
        return $this->phonePrimary;
    }

    public function setPhonePrimary(string $phonePrimary): self
    {
        $this->phonePrimary = $phonePrimary;

        return $this;
    }

    public function getPhoneSecondary(): ?string
    {
        return $this->phoneSecondary;
    }

    public function setPhoneSecondary(?string $phoneSecondary): self
    {
        $this->phoneSecondary = $phoneSecondary;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }


}
