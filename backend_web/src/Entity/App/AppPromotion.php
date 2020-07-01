<?php
namespace App\Entity\App;

use App\Entity\BaseEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 * AppPromotion
 * @ORM\Table(name="app_promotion")
 * @ORM\Entity
 */
class AppPromotion extends BaseEntity
{
    /**
     * @var int
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int|null
     * @ORM\Column(name="id_user", type="integer", nullable=true, options={"default"="NULL","comment"="a quien pertenece la promo"})
     */
    private $idUser = null;

    /**
     * @var int|null
     * @ORM\Column(name="id_type", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $idType = null;

    /**
     * @var \DateTime|null
     * @ORM\Column(name="date_from", type="datetime", nullable=true, options={"default"="NULL"})
     */
    private $dateFrom = null;

    /**
     * @var \DateTime|null
     * @ORM\Column(name="date_to", type="datetime", nullable=true, options={"default"="NULL"})
     */
    private $dateTo = null;

    /**
     * @var string|null
     * @ORM\Column(name="slug", type="string", length=250, nullable=true, options={"default"="NULL"})
     */
    private $slug = null;

    /**
     * @var string|null
     * @ORM\Column(name="url_nw", type="string", length=250, nullable=true, options={"default"="NULL","comment"="url en fb"})
     */
    private $urlNw = null;

    /**
     * @var string|null
     * @ORM\Column(name="url_design", type="string", length=250, nullable=true, options={"default"="NULL","comment"="diseño por defecto"})
     */
    private $urlDesign = null;

    /**
     * @var bool|null
     * @ORM\Column(name="is_active", type="boolean", nullable=true)
     */
    private $isActive = 0;

    /**
     * @var string|null
     * @ORM\Column(name="invested", type="decimal", precision=10, scale=3, nullable=true, options={"default"="0.000"})
     */
    private $invested = 0;

    /**
     * @var string|null
     * @ORM\Column(name="returned", type="decimal", precision=10, scale=3, nullable=true, options={"default"="0.000"})
     */
    private $returned = 0;

    /**
     * @var string|null
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
     * @return int|null
     */
    public function getIdUser(): ?int
    {
        return $this->idUser;
    }

    /**
     * @param int|null $idUser
     * @return AppPromotion
     */
    public function setIdUser(?int $idUser): AppPromotion
    {
        $this->idUser = $idUser;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getIdType(): ?int
    {
        return $this->idType;
    }

    /**
     * @param int|null $idType
     * @return AppPromotion
     */
    public function setIdType(?int $idType): AppPromotion
    {
        $this->idType = $idType;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getDateFrom(): ?\DateTime
    {
        return $this->dateFrom;
    }

    /**
     * @param \DateTime|null $dateFrom
     * @return AppPromotion
     */
    public function setDateFrom(?\DateTime $dateFrom): AppPromotion
    {
        $this->dateFrom = $dateFrom;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getDateTo(): ?\DateTime
    {
        return $this->dateTo;
    }

    /**
     * @param \DateTime|null $dateTo
     * @return AppPromotion
     */
    public function setDateTo(?\DateTime $dateTo): AppPromotion
    {
        $this->dateTo = $dateTo;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSlug(): ?string
    {
        return $this->slug;
    }

    /**
     * @param string|null $slug
     * @return AppPromotion
     */
    public function setSlug(?string $slug): AppPromotion
    {
        $this->slug = $slug;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getUrlNw(): ?string
    {
        return $this->urlNw;
    }

    /**
     * @param string|null $urlNw
     * @return AppPromotion
     */
    public function setUrlNw(?string $urlNw): AppPromotion
    {
        $this->urlNw = $urlNw;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getUrlDesign(): ?string
    {
        return $this->urlDesign;
    }

    /**
     * @param string|null $urlDesign
     * @return AppPromotion
     */
    public function setUrlDesign(?string $urlDesign): AppPromotion
    {
        $this->urlDesign = $urlDesign;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsActive(): ?bool
    {
        return $this->isActive;
    }

    /**
     * @param bool|null $isActive
     * @return AppPromotion
     */
    public function setIsActive(?bool $isActive): AppPromotion
    {
        $this->isActive = $isActive;
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
     * @return AppPromotion
     */
    public function setNotes(?string $notes): AppPromotion
    {
        $this->notes = $notes;
        return $this;
    }

}
