<?php

namespace App\Repository;

use App\Entity\PicturesNewsletter;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PicturesNewsletter>
 *
 * @method PicturesNewsletter|null find($id, $lockMode = null, $lockVersion = null)
 * @method PicturesNewsletter|null findOneBy(array $criteria, array $orderBy = null)
 * @method PicturesNewsletter[]    findAll()
 * @method PicturesNewsletter[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PicturesNewsletterRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PicturesNewsletter::class);
    }

//    /**
//     * @return PicturesNewsletter[] Returns an array of PicturesNewsletter objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?PicturesNewsletter
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
