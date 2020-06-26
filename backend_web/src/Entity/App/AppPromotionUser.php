<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AppPromotionUser
 *
 * @ORM\Table(name="app_promotion_user")
 * @ORM\Entity
 */
class AppPromotionUser
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
    private $birthdate = 'NULL';

    /**
     * @var string
     *
     * @ORM\Column(name="name1", type="string", length=15, nullable=false)
     */
    private $name1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name2", type="string", length=15, nullable=true, options={"default"="NULL"})
     */
    private $name2 = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="id_gender", type="string", length=5, nullable=true, options={"default"="NULL","comment"="promotion_array"})
     */
    private $idGender = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="m1", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $m1 = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="m2", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $m2 = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="m3", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $m3 = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="m4", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $m4 = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="m5", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $m5 = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="code_cache", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $codeCache = 'NULL';


}
