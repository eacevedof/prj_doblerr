<?php

namespace App\Entity\App;

use App\Entity\BaseEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 * AppProductImages
 *
 * @ORM\Table(name="app_product_images")
 * @ORM\Entity
 */
class AppProductImages extends BaseEntity
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
     * @ORM\Column(name="id_type", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $idType = null;

    /**
     * @var int
     *
     * @ORM\Column(name="id_product", type="integer", nullable=false)
     */
    private $idProduct;

    /**
     * @var string
     *
     * @ORM\Column(name="path_file", type="string", length=2000, nullable=false)
     */
    private $pathFile;

    /**
     * @var string|null
     *
     * @ORM\Column(name="slug", type="string", length=75, nullable=true, options={"default"="NULL"})
     */
    private $slug = null;

    /**
     * @var int|null
     *
     * @ORM\Column(name="order_by", type="integer", nullable=true, options={"default"="100"})
     */
    private $orderBy = '100';

//======================================================================================================================
//======================================================================================================================
//======================================================================================================================

}
