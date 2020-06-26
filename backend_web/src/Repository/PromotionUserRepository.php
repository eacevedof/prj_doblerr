<?php
// src/Repository/PromotionUserRepository.php
declare(strict_types=1);

namespace App\Repository;

use App\Entity\App\AppPromotionUser;

class PromotionUserRepository extends BaseRepository
{
    //en el construct se define objectRepository a partir del nombre de la clase de la entidad

    protected static function entityClass(): string
    {
        return AppPromotionUser::class;
    }

    public function findOneById(string $id): ?AppPromotionUser
    {
        /**
         * @var AppPromotionUser $product
         */
        $product = $this->objectRepository->find($id);
        return $product;
    }


    public function findBy(array $criteria, ?array $orderBy = null, $limit = null, $offset = null)
    {
        /** @var AppPromotionUser $product */
        $product = $this->objectRepository->findBy($criteria,  $orderBy, $limit, $offset);
        return $product;
    }

    public function findAll()
    {
        return $this->objectRepository->findAll();
    }

    public function save(AppPromotionUser $product): void
    {
        $this->saveEntity($product);
    }
}
