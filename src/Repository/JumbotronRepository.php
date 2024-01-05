<?php

namespace App\Repository;

use App\Entity\Jumbotron;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Jumbotron>
 *
 * @method Jumbotron|null find($id, $lockMode = null, $lockVersion = null)
 * @method Jumbotron|null findOneBy(array $criteria, array $orderBy = null)
 * @method Jumbotron[]    findAll()
 * @method Jumbotron[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JumbotronRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Jumbotron::class);
    }

    public function findPublishedJumbotron()
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.published = :published')
            ->setParameter('published', true)
            ->getQuery()
            ->getResult()
        ;
    }
}
