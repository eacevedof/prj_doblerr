<?php
namespace App\Entity\App;

use App\Entity\BaseEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 * AppPromotion
 *
 * @ORM\Table(name="app_promotion")
 * @ORM\Entity
 */
class AppPromotion extends BaseEntity
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
     * @var int|null
     *
     * @ORM\Column(name="id_user", type="integer", nullable=true, options={"default"="NULL","comment"="a quien pertenece la promo"})
     */
    private $idUser = null;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_type", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $idType = null;

    /**
     * @var string|null
     *
     * @ORM\Column(name="code_cache", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $codeCache = null;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_from", type="datetime", nullable=true, options={"default"="NULL"})
     */
    private $dateFrom = null;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_to", type="datetime", nullable=true, options={"default"="NULL"})
     */
    private $dateTo = null;

    /**
     * @var string|null
     *
     * @ORM\Column(name="slug", type="string", length=250, nullable=true, options={"default"="NULL"})
     */
    private $slug = null;

    /**
     * @var string|null
     *
     * @ORM\Column(name="url_nw", type="string", length=250, nullable=true, options={"default"="NULL"})
     */
    private $urlNw = null;

    /**
     * @var string|null
     *
     * @ORM\Column(name="url_design", type="string", length=250, nullable=true, options={"default"="NULL"})
     */
    private $urlDesign = null;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="is_active", type="boolean", nullable=true)
     */
    private $isActive = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=300, nullable=true, options={"default"="NULL"})
     */
    private $notes = null;


}
