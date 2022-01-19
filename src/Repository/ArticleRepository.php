<?php

namespace App\Repository;

use App\Entity\Article;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Article|null find($id, $lockMode = null, $lockVersion = null)
 * @method Article|null findOneBy(array $criteria, array $orderBy = null)
 * @method Article[]    findAll()
 * @method Article[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Article::class);
    }

    public function Search(int $idCat, string $name)
    {
        if($idCat==0 && $name ==""){
        $entityManager = $this->getEntityManager();
        $query = $entityManager->createQuery(
            "select a
            from App\Entity\Article a");
        }
      
        if($idCat==0 && $name !=""){
            $entityManager = $this->getEntityManager();
            $query = $entityManager->createQuery(
                "select a
                from App\Entity\Article a
                where a.name like :Name")
                -> setParameter('Name', "% $name %" );
        }
                
        if($name == "" && $idCat!=0){
            $entityManager = $this->getEntityManager();
            $query = $entityManager->createQuery(
                "select a
                from App\Entity\Article a
                where a.idCat = :idCat")
                -> setParameter('idCat', $idCat);
        }

        if($name !="" && $idCat !=0){
            $entityManager = $this->getEntityManager();
            $query = $entityManager->createQuery(
                "select a
                from App\Entity\Article a
                where a.idCat = :idCat
                AND a.name like :Name")
                -> setParameter('idCat', $idCat)
                -> setParameter('Name', "% $name %" );
        }
        return $query->getResult();   
    }

    

    // /**
    //  * @return Article[] Returns an array of Article objects
    //  */
   
    //public function findByCategorie($value)
   // {
        //return $this->createQueryBuilder('a')
            //->andWhere('a.idCat = :val')
            //->setParameter('val', $value)
            //->orderBy('a.name', 'ASC')
            //->setMaxResults(10)
            //->getQuery()
            //->getResult()
     //   ;
   // }
  

    /*
    public function findOneBySomeField($value): ?Article
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
