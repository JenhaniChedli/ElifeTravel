<?php

namespace App\Repository;

use App\Entity\Destination;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Destination|null find($id, $lockMode = null, $lockVersion = null)
 * @method Destination|null findOneBy(array $criteria, array $orderBy = null)
 * @method Destination[]    findAll()
 * @method Destination[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DestinationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Destination::class);



    }

    // /**
    //  * @return Destination[] Returns an array of Destination objects
    //  */





    public function findOneBydatedepart()
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.datedepart >:val')
            ->setParameter('val', new \Datetime(date('d-m-Y')))
            ->getQuery()
            ->getResult()
        ;
    }

}
