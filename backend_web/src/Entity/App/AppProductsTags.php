<?php

namespace App\Entity\App;

use App\Entity\BaseEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 * AppProductsTags
 *
 * @ORM\Table(name="app_products_tags")
 * @ORM\Entity
 */
class AppProductsTags extends BaseEntity
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
     * @ORM\Column(name="id_product", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $idProduct = null;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_tag", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $idTag = null;

//======================================================================================================================
//======================================================================================================================
//======================================================================================================================

}
