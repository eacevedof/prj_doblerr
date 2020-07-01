<?php
namespace App\Entity\App;

use App\Entity\BaseEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 * AppPromotionUrls
 * @ORM\Table(name="app_promotion_urls")
 * @ORM\Entity
 */
class AppPromotionUrls
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
    
}
