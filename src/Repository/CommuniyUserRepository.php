<?php

namespace App\Repository;

use App\Entity\CommunityUser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CommunityUser|null find($id, $lockMode = null, $lockVersion = null)
 * @method CommunityUser|null findOneBy(array $criteria, array $orderBy = null)
 * @method CommunityUser[]    findAll()
 * @method CommunityUser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CommuniyUserRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CommunityUser::class);
    }

    // /**
    //  * @return CommuniyUser[] Returns an array of CommuniyUser objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CommuniyUser
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
