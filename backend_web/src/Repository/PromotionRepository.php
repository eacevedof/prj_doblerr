<?php
// src/Repository/PromotionRepository.php
declare(strict_types=1);

namespace App\Repository;

use App\Entity\App\AppPromotion;

class PromotionRepository extends BaseRepository
{
    //en el construct se define objectRepository a partir del nombre de la clase de la entidad

    protected static function entityClass(): string
    {
        return AppPromotion::class;
    }

    public function findOneById(string $id): ?AppPromotion
    {
        /**
         * @var AppPromotion $entity
         */
        $entity = $this->objectRepository->find($id);
        return $entity;
    }


    public function findBy(array $criteria, ?array $orderBy = null, $limit = null, $offset = null)
    {
        /** @var AppPromotion $entity */
        $entity = $this->objectRepository->findBy($criteria,  $orderBy, $limit, $offset);
        return $entity;
    }

    public function findAll()
    {
        return $this->objectRepository->findAll();
    }

    public function findBySlug(string $slug=""){
        $arcond = [
            "slug" => $slug
        ];
        return $this->findBy($arcond,null,1,0);
    }

    public function findByDate(string $slug=""){
        $today = date("Ymd");
        $qb = $this->getOrmQueryBuilder();
        $qb->select("p")
            ->from(self::entityClass(),"p")
            ->where($qb->expr()->isNull("p.deleteDate"))
            ->andWhere("p.slug=:slug")->setParameter("slug",$slug)
            ->andWhere("p.dateFrom<='$today'")
            ->andWhere("p.dateTo>='$today'");

        $q = $qb->getQuery();
        $this->log($q->getDQL(),"promorepo.findByDate.q");
        $r = $q->getResult();
        //var_dump($r);die;
        return $r;
    }
    
    public function save(AppPromotion $entity): void
    {
        $this->saveEntity($entity);
    }
}
