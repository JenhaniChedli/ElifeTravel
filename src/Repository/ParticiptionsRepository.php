<?php

namespace App\Repository;

use App\Entity\Participtions;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Participtions|null find($id, $lockMode = null, $lockVersion = null)
 * @method Participtions|null findOneBy(array $criteria, array $orderBy = null)
 * @method Participtions[]    findAll()
 * @method Participtions[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ParticiptionsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Participtions::class);
    }

    // /**
    //  * @return Participtions[] Returns an array of Participtions objects
    //  */

    public function validationdeparticiption($value1,$value2)
    {
        return $this->createQueryBuilder('p')
            ->select('count(p.id)')
            ->andWhere('p.idUser = :val1')
            ->andWhere('p.idDestination = :val2')
            ->setParameter('val1', $value1)
            ->setParameter('val2', $value2)
            ->getQuery()
            ->getResult();
    }
    public function getparticiptionsbydestination($value)
    {
        return $this->createQueryBuilder('p')
            ->select('p.idUser ,p.payment')
            ->andWhere('p.idDestination = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getResult();
    }
    public function getparticiptionsbyids($value,$val)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.idDestination = :val')
            ->andWhere('p.idUser = :val1')
            ->setParameter('val', $value)
            ->setParameter('val1', $val)
            ->getQuery()
            ->getResult();
    }
    /*
    public function findOneBySomeField($value): ?Participtions
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
