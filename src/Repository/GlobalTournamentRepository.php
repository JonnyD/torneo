<?php

namespace App\Repository;

use App\Entity\GlobalTournament;
use App\Entity\Tournament;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method GlobalTournament|null find($id, $lockMode = null, $lockVersion = null)
 * @method GlobalTournament|null findOneBy(array $criteria, array $orderBy = null)
 * @method GlobalTournament[]    findAll()
 * @method GlobalTournament[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GlobalTournamentRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, GlobalTournament::class);
    }

    // /**
    //  * @return Tournament[] Returns an array of Tournament objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Tournament
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
