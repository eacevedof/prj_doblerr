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
    private $isConfirmed = '0';

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
     * @var string|null
     *
     * @ORM\Column(name="code_cache", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $codeCache = null;


}
