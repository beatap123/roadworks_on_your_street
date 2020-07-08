<?php

namespace App\Repository;

use App\Entity\Roboty;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Roboty|null find($id, $lockMode = null, $lockVersion = null)
 * @method Roboty|null findOneBy(array $criteria, array $orderBy = null)
 * @method Roboty[]    findAll()
 * @method Roboty[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RobotyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Roboty::class);
    }

    // /**
    //  * @return Roboty[] Returns an array of Roboty objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Roboty
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
