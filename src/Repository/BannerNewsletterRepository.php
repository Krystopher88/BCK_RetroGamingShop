<?php

namespace App\Repository;

use App\Entity\BannerNewsletter;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<BannerNewsletter>
 *
 * @method BannerNewsletter|null find($id, $lockMode = null, $lockVersion = null)
 * @method BannerNewsletter|null findOneBy(array $criteria, array $orderBy = null)
 * @method BannerNewsletter[]    findAll()
 * @method BannerNewsletter[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BannerNewsletterRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BannerNewsletter::class);
    }

//    /**
//     * @return BannerNewsletter[] Returns an array of BannerNewsletter objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('b.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?BannerNewsletter
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
