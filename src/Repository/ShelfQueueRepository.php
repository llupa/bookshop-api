<?php

namespace App\Repository;

use App\Entity\ShelfQueue;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ShelfQueue>
 *
 * @method ShelfQueue|null find($id, $lockMode = null, $lockVersion = null)
 * @method ShelfQueue|null findOneBy(array $criteria, array $orderBy = null)
 * @method ShelfQueue[]    findAll()
 * @method ShelfQueue[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ShelfQueueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ShelfQueue::class);
    }

    //    /**
    //     * @return ShelfQueue[] Returns an array of ShelfQueue objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('s.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?ShelfQueue
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
