<?php

namespace App\Entity\App;

use Doctrine\ORM\Mapping as ORM;

use App\Entity\BaseEntity;

/**
 * AppOrderLines
 *
 * @ORM\Table(name="app_order_lines")
 * @ORM\Entity
 */
class AppOrderLines extends BaseEntity
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
     * @ORM\Column(name="description", type="string", length=250, nullable=true, options={"default"="NULL"})
     */
    private $description = null;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_order_head", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $idOrderHead = null;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_product", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $idProduct = null;

    /**
     * @var string|null
     *
     * @ORM\Column(name="price", type="decimal", precision=10, scale=3, nullable=true, options={"default"="NULL"})
     */
    private $price = null;


}
