<?php

namespace App\Entity\App;

use App\Entity\BaseEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 * AppPromotionsSubscriptions
 *
 * @ORM\Table(name="app_promotions_subscriptions")
 * @ORM\Entity
 */
class AppPromotionsSubscriptions extends BaseEntity
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

//======================================================================================================================
//======================================================================================================================
//======================================================================================================================

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
     * @return AppPromotionsSubscriptions
     */
    public function setIdPromotion(int $idPromotion): AppPromotionsSubscriptions
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
     * @return AppPromotionsSubscriptions
     */
    public function setIdPromouser(int $idPromouser): AppPromotionsSubscriptions
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
     * @return AppPromotionsSubscriptions
     */
    public function setDateSubs(?\DateTime $dateSubs): AppPromotionsSubscriptions
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
     * @return AppPromotionsSubscriptions
     */
    public function setCode1(?string $code1): AppPromotionsSubscriptions
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
     * @return AppPromotionsSubscriptions
     */
    public function setDateConfirm(?\DateTime $dateConfirm): AppPromotionsSubscriptions
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
     * @return AppPromotionsSubscriptions
     */
    public function setIsConfirmed(?bool $isConfirmed): AppPromotionsSubscriptions
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
     * @return AppPromotionsSubscriptions
     */
    public function setDateExec(?\DateTime $dateExec): AppPromotionsSubscriptions
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
     * @return AppPromotionsSubscriptions
     */
    public function setNotes(?string $notes): AppPromotionsSubscriptions
    {
        $this->notes = $notes;
        return $this;
    }



}
