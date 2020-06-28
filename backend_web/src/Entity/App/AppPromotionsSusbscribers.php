<?php

namespace App\Entity\App;

use App\Entity\BaseEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 * AppPromotionsSusbscribers
 *
 * @ORM\Table(name="app_promotions_susbscribers")
 * @ORM\Entity
 */
class AppPromotionsSusbscribers extends BaseEntity
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="id_promotion", type="integer", nullable=false)
     */
    private $idPromotion;

    /**
     * @var int
     *
     * @ORM\Column(name="id_promouser", type="integer", nullable=false)
     */
    private $idPromouser;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_subs", type="datetime", nullable=true, options={"default"="NULL"})
     */
    private $dateSubs = null;

    /**
     * @var string|null
     *
     * @ORM\Column(name="code1", type="string", length=15, nullable=true, options={"default"="NULL"})
     */
    private $code1 = null;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_confirm", type="datetime", nullable=true, options={"default"="NULL"})
     */
    private $dateConfirm = null;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="is_confirmed", type="boolean", nullable=true)
     */
    private $isConfirmed = 0;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_exec", type="datetime", nullable=true, options={"default"="NULL"})
     */
    private $dateExec = null;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=300, nullable=true, options={"default"="NULL"})
     */
    private $notes = null;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getIdPromotion(): int
    {
        return $this->idPromotion;
    }

    /**
     * @param int $idPromotion
     * @return AppPromotionsSusbscribers
     */
    public function setIdPromotion(int $idPromotion): AppPromotionsSusbscribers
    {
        $this->idPromotion = $idPromotion;
        return $this;
    }

    /**
     * @return int
     */
    public function getIdPromouser(): int
    {
        return $this->idPromouser;
    }

    /**
     * @param int $idPromouser
     * @return AppPromotionsSusbscribers
     */
    public function setIdPromouser(int $idPromouser): AppPromotionsSusbscribers
    {
        $this->idPromouser = $idPromouser;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getDateSubs(): ?\DateTime
    {
        return $this->dateSubs;
    }

    /**
     * @param \DateTime|null $dateSubs
     * @return AppPromotionsSusbscribers
     */
    public function setDateSubs(?\DateTime $dateSubs): AppPromotionsSusbscribers
    {
        $this->dateSubs = $dateSubs;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCode1(): ?string
    {
        return $this->code1;
    }

    /**
     * @param string|null $code1
     * @return AppPromotionsSusbscribers
     */
    public function setCode1(?string $code1): AppPromotionsSusbscribers
    {
        $this->code1 = $code1;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getDateConfirm(): ?\DateTime
    {
        return $this->dateConfirm;
    }

    /**
     * @param \DateTime|null $dateConfirm
     * @return AppPromotionsSusbscribers
     */
    public function setDateConfirm(?\DateTime $dateConfirm): AppPromotionsSusbscribers
    {
        $this->dateConfirm = $dateConfirm;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsConfirmed(): ?bool
    {
        return $this->isConfirmed;
    }

    /**
     * @param bool|null $isConfirmed
     * @return AppPromotionsSusbscribers
     */
    public function setIsConfirmed(?bool $isConfirmed): AppPromotionsSusbscribers
    {
        $this->isConfirmed = $isConfirmed;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getDateExec(): ?\DateTime
    {
        return $this->dateExec;
    }

    /**
     * @param \DateTime|null $dateExec
     * @return AppPromotionsSusbscribers
     */
    public function setDateExec(?\DateTime $dateExec): AppPromotionsSusbscribers
    {
        $this->dateExec = $dateExec;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getNotes(): ?string
    {
        return $this->notes;
    }

    /**
     * @param string|null $notes
     * @return AppPromotionsSusbscribers
     */
    public function setNotes(?string $notes): AppPromotionsSusbscribers
    {
        $this->notes = $notes;
        return $this;
    }



}
