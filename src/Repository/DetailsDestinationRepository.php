<?php

namespace App\Repository;

use App\Entity\DetailsDestination;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DetailsDestination|null find($id, $lockMode = null, $lockVersion = null)
 * @method DetailsDestination|null findOneBy(array $criteria, array $orderBy = null)
 * @method DetailsDestination[]    findAll()
 * @method DetailsDestination[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DetailsDestinationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DetailsDestination::class);
    }

    // /**
    //  * @return DetailsDestination[] Returns an array of DetailsDestination objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DetailsDestination
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
