<?php

namespace App\Entity\App;

use Doctrine\ORM\Mapping as ORM;

use App\Entity\BaseEntity;

/**
 * AppOrderHead
 *
 * @ORM\Table(name="app_order_head")
 * @ORM\Entity
 */
class AppOrderHead extends BaseEntity
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
     * @ORM\Column(name="id_user_client", type="integer", nullable=false)
     */
    private $idUserClient;

    /**
     * @var int
     *
     * @ORM\Column(name="id_user_seller", type="integer", nullable=false)
     */
    private $idUserSeller;

    /**
     * @var string|null
     *
     * @ORM\Column(name="total", type="decimal", precision=10, scale=3, nullable=true, options={"default"="0.000"})
     */
    private $total = '0.000';

    /**
     * @var string|null
     *
     * @ORM\Column(name="status", type="string", length=25, nullable=true, options={"default"="NULL"})
     */
    private $status = null;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=2000, nullable=true, options={"default"="NULL"})
     */
    private $notes = null;


}
