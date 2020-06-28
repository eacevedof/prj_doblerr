<?php

namespace App\Entity\App;

use App\Entity\BaseEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 * AppPromotionUser
 * @ORM\Table(name="app_promotion_user")
 * @ORM\Entity
 */
class AppPromotionUser extends BaseEntity
{
    /**
     * @var int
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="phone1", type="string", length=20, nullable=false, options={"comment"="telefono"})
     */
    private $phone1;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100, nullable=false)
     */
    private $email;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="birthdate", type="datetime", nullable=true, options={"default"="NULL","comment"="cuando se ejecuta la promo"})
     */
    private $birthdate = null;

    /**
     * @var string
     * @ORM\Column(name="name1", type="string", length=15, nullable=false)
     */
    private $name1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name2", type="string", length=15, nullable=true, options={"default"="NULL"})
     */
    private $name2 = null;

    /**
     * @var string|null
     *
     * @ORM\Column(name="id_gender", type="string", length=5, nullable=true, options={"default"="NULL","comment"="promotion_array"})
     */
    private $idGender = null;

    /**
     * @var int|null
     *
     * @ORM\Column(name="m1", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $m1 = null;

    /**
     * @var int|null
     *
     * @ORM\Column(name="m2", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $m2 = null;

    /**
     * @var int|null
     *
     * @ORM\Column(name="m3", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $m3 = null;

    /**
     * @var int|null
     *
     * @ORM\Column(name="m4", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $m4 = null;

    /**
     * @var int|null
     *
     * @ORM\Column(name="m5", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $m5 = null;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getPhone1(): string
    {
        return $this->phone1;
    }

    /**
     * @param string $phone1
     * @return AppPromotionUser
     */
    public function setPhone1(string $phone1): AppPromotionUser
    {
        $this->phone1 = $phone1;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return AppPromotionUser
     */
    public function setEmail(string $email): AppPromotionUser
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getBirthdate(): ?\DateTime
    {
        return $this->birthdate;
    }

    /**
     * @param \DateTime|null $birthdate
     * @return AppPromotionUser
     */
    public function setBirthdate(?\DateTime $birthdate): AppPromotionUser
    {
        $this->birthdate = $birthdate;
        return $this;
    }

    /**
     * @return string
     */
    public function getName1(): string
    {
        return $this->name1;
    }

    /**
     * @param string $name1
     * @return AppPromotionUser
     */
    public function setName1(string $name1): AppPromotionUser
    {
        $this->name1 = $name1;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getName2(): ?string
    {
        return $this->name2;
    }

    /**
     * @param string|null $name2
     * @return AppPromotionUser
     */
    public function setName2(?string $name2): AppPromotionUser
    {
        $this->name2 = $name2;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getIdGender(): ?string
    {
        return $this->idGender;
    }

    /**
     * @param string|null $idGender
     * @return AppPromotionUser
     */
    public function setIdGender(?string $idGender): AppPromotionUser
    {
        $this->idGender = $idGender;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getM1(): ?int
    {
        return $this->m1;
    }

    /**
     * @param int|null $m1
     * @return AppPromotionUser
     */
    public function setM1(?int $m1): AppPromotionUser
    {
        $this->m1 = $m1;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getM2(): ?int
    {
        return $this->m2;
    }

    /**
     * @param int|null $m2
     * @return AppPromotionUser
     */
    public function setM2(?int $m2): AppPromotionUser
    {
        $this->m2 = $m2;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getM3(): ?int
    {
        return $this->m3;
    }

    /**
     * @param int|null $m3
     * @return AppPromotionUser
     */
    public function setM3(?int $m3): AppPromotionUser
    {
        $this->m3 = $m3;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getM4(): ?int
    {
        return $this->m4;
    }

    /**
     * @param int|null $m4
     * @return AppPromotionUser
     */
    public function setM4(?int $m4): AppPromotionUser
    {
        $this->m4 = $m4;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getM5(): ?int
    {
        return $this->m5;
    }

    /**
     * @param int|null $m5
     * @return AppPromotionUser
     */
    public function setM5(?int $m5): AppPromotionUser
    {
        $this->m5 = $m5;
        return $this;
    }
}
