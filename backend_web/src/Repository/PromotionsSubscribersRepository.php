<?php
// src/Repository/PromotionsSubscribersRepository.php
declare(strict_types=1);

namespace App\Repository;

use App\Entity\App\AppPromotionsSubscribers;

class PromotionsSubscribersRepository extends BaseRepository
{
    //en el construct se define objectRepository a partir del nombre de la clase de la entidad

    protected static function entityClass(): string
    {
        return AppPromotionsSubscribers::class;
    }

    public function findOneById(string $id): ?AppPromotionsSubscribers
    {
        /**
         * @var AppPromotionsSubscribers $product
         */
        $product = $this->objectRepository->find($id);
        return $product;
    }


    public function findBy(array $criteria, ?array $orderBy = null, $limit = null, $offset = null)
    {
        /** @var AppPromotionsSubscribers $product */
        $product = $this->objectRepository->findBy($criteria,  $orderBy, $limit, $offset);
        return $product;
    }

    public function findAll()
    {
        return $this->objectRepository->findAll();
    }

    public function save(AppPromotionsSubscribers $product): void
    {
        $this->saveEntity($product);
    }
}// PromotionsSubscribersRepository
