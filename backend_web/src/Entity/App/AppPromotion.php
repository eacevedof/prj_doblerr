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
     * @var string|null
     *
     * @ORM\Column(name="processflag", type="string", length=5, nullable=true, options={"default"="NULL"})
     */
    private $processflag = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="insert_platform", type="string", length=3, nullable=true, options={"default"="'1'"})
     */
    private $insertPlatform = '\'1\'';

    /**
     * @var string|null
     *
     * @ORM\Column(name="insert_user", type="string", length=15, nullable=true, options={"default"="NULL"})
     */
    private $insertUser = 'NULL';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="insert_date", type="datetime", nullable=false, options={"default"="current_timestamp()"})
     */
    private $insertDate = 'current_timestamp()';

    /**
     * @var string|null
     *
     * @ORM\Column(name="update_platform", type="string", length=3, nullable=true, options={"default"="NULL"})
     */
    private $updatePlatform = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="update_user", type="string", length=15, nullable=true, options={"default"="NULL"})
     */
    private $updateUser = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="update_date", type="datetime", nullable=true, options={"default"="current_timestamp()"})
     */
    private $updateDate = 'current_timestamp()';

    /**
     * @var string|null
     *
     * @ORM\Column(name="delete_platform", type="string", length=3, nullable=true, options={"default"="NULL"})
     */
    private $deletePlatform = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="delete_user", type="string", length=15, nullable=true, options={"default"="NULL"})
     */
    private $deleteUser = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="delete_date", type="datetime", nullable=true, options={"default"="NULL"})
     */
    private $deleteDate = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="cru_csvnote", type="string", length=500, nullable=true, options={"default"="NULL"})
     */
    private $cruCsvnote = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="is_erpsent", type="string", length=3, nullable=true, options={"default"="'0'"})
     */
    private $isErpsent = '\'0\'';

    /**
     * @var string|null
     *
     * @ORM\Column(name="is_enabled", type="string", length=3, nullable=true, options={"default"="'1'"})
     */
    private $isEnabled = '\'1\'';

    /**
     * @var int|null
     *
     * @ORM\Column(name="i", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $i = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=250, nullable=true, options={"default"="NULL"})
     */
    private $description = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_user", type="integer", nullable=true, options={"default"="NULL","comment"="a quien pertenece la promo"})
     */
    private $idUser = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_type", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $idType = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="code_cache", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $codeCache = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_from", type="datetime", nullable=true, options={"default"="NULL"})
     */
    private $dateFrom = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_to", type="datetime", nullable=true, options={"default"="NULL"})
     */
    private $dateTo = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="slug", type="string", length=250, nullable=true, options={"default"="NULL"})
     */
    private $slug = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="url_nw", type="string", length=250, nullable=true, options={"default"="NULL"})
     */
    private $urlNw = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="url_design", type="string", length=250, nullable=true, options={"default"="NULL"})
     */
    private $urlDesign = 'NULL';

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
    private $notes = 'NULL';


}
