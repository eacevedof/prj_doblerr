<?php
namespace App\Entity\App;

use App\Entity\BaseEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 * AppProduct
 *
 * @ORM\Table(name="app_product")
 * @ORM\Entity
 */
class AppProduct extends BaseEntity
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
     * @ORM\Column(name="code_erp", type="string", length=25, nullable=true, options={"default"="NULL"})
     */
    private $codeErp = null;

    /**
     * @var string|null
     * @ORM\Column(name="description", type="string", length=250, nullable=true, options={"default"="NULL"})
     */
    private $description = null;

    /**
     * @var string|null
     * @ORM\Column(name="description_full", type="string", length=3000, nullable=true, options={"default"="NULL"})
     */
    private $descriptionFull = null;

    /**
     * @var string|null
     * @ORM\Column(name="slug", type="string", length=75, nullable=true, options={"default"="NULL"})
     */
    private $slug = null;

    /**
     * @var int
     * @ORM\Column(name="units_min", type="integer", nullable=false, options={"default"="1"})
     */
    private $unitsMin = '1';

    /**
     * @var int
     * @ORM\Column(name="units_max", type="integer", nullable=false, options={"default"="99999"})
     */
    private $unitsMax = '99999';

    /**
     * @var string|null
     *
     * @ORM\Column(name="price_gross", type="decimal", precision=10, scale=3, nullable=true, options={"default"="0"})
     */
    private $priceGross = 0;

    /**
     * @var string|null
     * @ORM\Column(name="tax_percent", type="decimal", precision=10, scale=3, nullable=true, options={"default"="0"})
     */
    private $taxPercent = 0;

    /**
     * @var string|null
     * @ORM\Column(name="price_taxed", type="decimal", precision=10, scale=3, nullable=true, options={"default"="0"})
     */
    private $priceTaxed = 0;

    /**
     * @var string
     * @ORM\Column(name="price_sale", type="decimal", precision=10, scale=3, nullable=false, options={"default"="0"})
     */
    private $priceSale = 0;

    /**
     * @var int
     * @ORM\Column(name="user_id", type="integer", nullable=false, options={"comment"="empresa o usuario propietario"})
     */
    private $userId;

    /**
     * @var int|null
     * @ORM\Column(name="order_by", type="integer", nullable=true, options={"default"="100"})
     */
    private $orderBy = '100';

    /**
     * @var string|null
     * @ORM\Column(name="code_cache", type="string", length=500, nullable=true, options={"default"="NULL"})
     */
    private $codeCache = null;


}
