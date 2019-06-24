<?php

namespace App\Repository;

use App\Entity\PlatformGame;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method PlatformGame|null find($id, $lockMode = null, $lockVersion = null)
 * @method PlatformGame|null findOneBy(array $criteria, array $orderBy = null)
 * @method PlatformGame[]    findAll()
 * @method PlatformGame[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlatformGameRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PlatformGame::class);
    }

    // /**
    //  * @return PlatformGame[] Returns an array of PlatformGame objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PlatformGame
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
