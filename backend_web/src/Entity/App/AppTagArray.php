<?php
namespace App\Entity\App;

use App\Entity\BaseEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 * AppTagArray
 *
 * @ORM\Table(name="app_tag_array")
 * @ORM\Entity
 */
class AppTagArray extends BaseEntity
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
     * @ORM\Column(name="type", type="string", length=15, nullable=true, options={"default"="NULL"})
     */
    private $type = null;

    /**
     * @var string|null
     *
     * @ORM\Column(name="id_tosave", type="string", length=25, nullable=true, options={"default"="NULL"})
     */
    private $idTosave = null;

    /**
     * @var int
     *
     * @ORM\Column(name="order_by", type="integer", nullable=false, options={"default"="100"})
     */
    private $orderBy = '100';

//======================================================================================================================
//======================================================================================================================
//======================================================================================================================

}
