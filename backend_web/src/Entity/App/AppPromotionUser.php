<?php

namespace App\Entity\App;

use App\Entity\BaseEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 * AppPromotionUser
 *
 * @ORM\Table(name="app_promotion_user")
 * @ORM\Entity
 */
class AppPromotionUser extends BaseEntity
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
