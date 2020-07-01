<?php
namespace App\Entity\App;

use App\Entity\BaseEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 * AppPromotionUrls
 * @ORM\Table(name="app_promotion_urls")
 * @ORM\Entity
 */
class AppPromotionUrls extends BaseEntity
{
    /**
     * @var int
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     * @ORM\Column(name="id_promotion", type="integer", nullable=false)
     */
    private $idPromotion;

    /**
     * @var int
     * @ORM\Column(name="id_type", type="integer", nullable=false, options={"default"="1","comment"="promotion_array: fb|web|youtube,..."})
     */
    private $idType = '1';

    /**
     * @var string|null
     * @ORM\Column(name="design", type="string", length=250, nullable=true, options={"default"="NULL","comment"="url de la creatividad"})
     */
    private $design = null;

    /**
     * @var string|null
     * @ORM\Column(name="notes", type="string", length=300, nullable=true, options={"default"="NULL"})
     */
    private $notes = null;

    /**
     * @var bool|null
     * @ORM\Column(name="is_active", type="boolean", nullable=true, options={"default"="1"})
     */
    private $isActive = true;

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
     * @param int $id
     * @return AppPromotionUrls
     */
    public function setId(int $id): AppPromotionUrls
    {
        $this->id = $id;
        return $this;
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
     * @return AppPromotionUrls
     */
    public function setIdPromotion(int $idPromotion): AppPromotionUrls
    {
        $this->idPromotion = $idPromotion;
        return $this;
    }

    /**
     * @return int
     */
    public function getIdType(): int
    {
        return $this->idType;
    }

    /**
     * @param int $idType
     * @return AppPromotionUrls
     */
    public function setIdType(int $idType): AppPromotionUrls
    {
        $this->idType = $idType;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDesign(): ?string
    {
        return $this->design;
    }

    /**
     * @param string|null $design
     * @return AppPromotionUrls
     */
    public function setDesign(?string $design): AppPromotionUrls
    {
        $this->design = $design;
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
     * @return AppPromotionUrls
     */
    public function setNotes(?string $notes): AppPromotionUrls
    {
        $this->notes = $notes;
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
     * @return AppPromotionUrls
     */
    public function setIsActive(?bool $isActive): AppPromotionUrls
    {
        $this->isActive = $isActive;
        return $this;
    }

}
