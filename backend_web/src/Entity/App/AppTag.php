<?php

namespace App\Entity\App;

use App\Entity\BaseEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 * AppTag
 *
 * @ORM\Table(name="app_tag")
 * @ORM\Entity
 */
class AppTag extends BaseEntity
{
    /**
     * @var int
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;


    /**
     * @var int|null
     * @ORM\Column(name="id_type", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $idType = null;

    /**
     * @var string|null
     * @ORM\Column(name="description", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $description = null;

    /**
     * @var int|null
     * @ORM\Column(name="id_user", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $idUser = null;

    /**
     * @var string|null
     * @ORM\Column(name="slug", type="string", length=100, nullable=true, options={"default"="NULL","comment"="la descripcion en slug"})
     */
    private $slug = null;

    /**
     * @var int
     * @ORM\Column(name="order_by", type="integer", nullable=false, options={"default"="100"})
     */
    private $orderBy = '100';

}
