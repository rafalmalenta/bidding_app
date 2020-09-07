<?php

namespace App\Repository;

use App\Entity\Bids;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Bids|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bids|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bids[]    findAll()
 * @method Bids[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BidsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Bids::class);
    }

    // /**
    //  * @return Bids[] Returns an array of Bids objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Bids
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
