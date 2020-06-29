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
        /** @var AppPromotionsSusbscribers $entity */
        $entity = $this->objectRepository->findBy($criteria,  $orderBy, $limit, $offset);
        return $entity;
    }

    public function findByPromoUser($idpromotion, $idpromouser):?AppPromotionsSusbscribers
    {
        $criteria = [
            "idPromotion" => $idpromotion,"idPromouser" => $idpromouser,
            //"is_confirmed" => 0
        ];
        $entity = $this->findBy($criteria);
        return $entity;
    }

    public function findByCode1(?string $codeconfirm):?AppPromotionsSusbscribers
    {
        $criteria = [
            "code1" => $codeconfirm,
        ];
        $entity = $this->findBy($criteria);
        return $entity;
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
