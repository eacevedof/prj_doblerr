<?php
// src/Repository/PromotionsSubscribersRepository.php
declare(strict_types=1);

namespace App\Repository;

use App\Entity\App\AppPromotionsSubscriptions;

class PromotionsSubscribersRepository extends BaseRepository
{
    //en el construct se define objectRepository a partir del nombre de la clase de la entidad

    protected static function entityClass(): string
    {
        return AppPromotionsSubscriptions::class;
    }

    public function findOneById(string $id): ?AppPromotionsSubscriptions
    {
        /**
         * @var AppPromotionsSubscriptions $entity
         */
        $entity = $this->objectRepository->find($id);
        return $entity;
    }


    public function findBy(array $criteria, ?array $orderBy = null, $limit = null, $offset = null)
    {
        /** @var AppPromotionsSubscriptions[] $r */
        $r = $this->objectRepository->findBy($criteria,  $orderBy, $limit, $offset);
        return $r;
    }

    public function findByPromoUser($idpromotion, $idpromouser):?AppPromotionsSubscriptions
    {
        $criteria = [
            "idPromotion" => $idpromotion,"idPromouser" => $idpromouser,
        ];
        $r = $this->findBy($criteria);
        return $r[0] ?? null;
    }

    public function findByCode1(?string $codeconfirm):?AppPromotionsSubscriptions
    {
        $criteria = [
            "code1" => $codeconfirm,
        ];
        $r = $this->findBy($criteria);
        return $r[0] ?? null;
    }


    public function findAll()
    {
        return $this->objectRepository->findAll();
    }

    public function save(AppPromotionsSubscriptions $entity): void
    {
        $this->saveEntity($entity);
    }
}// PromotionsSubscribersRepository
