<?php

namespace App\Repository;

use App\Entity\Nidhal;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Nidhal>
 *
 * @method Nidhal|null find($id, $lockMode = null, $lockVersion = null)
 * @method Nidhal|null findOneBy(array $criteria, array $orderBy = null)
 * @method Nidhal[]    findAll()
 * @method Nidhal[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NidhalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Nidhal::class);
    }

//    /**
//     * @return Nidhal[] Returns an array of Nidhal objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('n.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Nidhal
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
