<?php

namespace App\Repository;

use App\Entity\Gamer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Gamer|null find($id, $lockMode = null, $lockVersion = null)
 * @method Gamer|null findOneBy(array $criteria, array $orderBy = null)
 * @method Gamer[]    findAll()
 * @method Gamer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GamerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Gamer::class);
    }

    // /**
    //  * @return Gamer[] Returns an array of Gamer objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Gamer
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
