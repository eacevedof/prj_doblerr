<?php
// src/Repository/PromotionsSubscribersRepository.php
declare(strict_types=1);

namespace App\Repository;

use App\Entity\App\AppPromotionsSusbscribers;

class PromotionsSubscribersRepository extends BaseRepository
{
    //en el construct se define objectRepository a partir del nombre de la clase de la entidad

    protected static function entityClass(): string
    {
        return AppPromotionsSusbscribers::class;
    }

    public function findOneById(string $id): ?AppPromotionsSusbscribers
    {
        /**
         * @var AppPromotionsSusbscribers $entity
         */
        $entity = $this->objectRepository->find($id);
        return $entity;
    }


    public function findBy(array $criteria, ?array $orderBy = null, $limit = null, $offset = null)
    {
        /** @var AppPromotionsSusbscribers[] $r */
        $r = $this->objectRepository->findBy($criteria,  $orderBy, $limit, $offset);
        return $r;
    }

    public function findByPromoUser($idpromotion, $idpromouser):?AppPromotionsSusbscribers
    {
        $criteria = [
            "idPromotion" => $idpromotion,"idPromouser" => $idpromouser,
        ];
        $r = $this->findBy($criteria);
        return $r[0] ?? null;
    }

    public function findByCode1(?string $codeconfirm):?AppPromotionsSusbscribers
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

    public function save(AppPromotionsSusbscribers $entity): void
    {
        $this->saveEntity($entity);
    }
}// PromotionsSubscribersRepository
