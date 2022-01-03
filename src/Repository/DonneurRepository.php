<?php

namespace App\Repository;

use App\Entity\Centre;
use App\Entity\Donneur;
use App\Entity\Operateur;
use Doctrine\ORM\Query\Expr\Join;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method Donneur|null find($id, $lockMode = null, $lockVersion = null)
 * @method Donneur|null findOneBy(array $criteria, array $orderBy = null)
 * @method Donneur[]    findAll()
 * @method Donneur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DonneurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Donneur::class);
    }


    /**
     * @return int|mixed|string
     */
    public function countAllDonators(){

        $qb=$this->createQueryBuilder('a');

           

        $qb->select('COUNT(a.id) as value');

        return $qb->getQuery()->getOneorNullResult();
           
    }

  
        

    public function filter($type, bool $includeUnavailableProducts = false): array
    {

        
        $qb = $this->createQueryBuilder('D')
                   ->select('D')
                   ->leftJoin('D.don', 'DON');

                   if ($type != null) {

                    $qb = $qb->where('DON.groupe = :type')
              
                        ->setParameter('type', $type);
                }
        $query = $qb->getQuery();
        return $query->execute();
    }

   /* public function countAllDonsByCentre(){
        
        $centreObject = new Centre();
        $centreName = $centreObject->getNom();
        foreach($centreName as $value){
        $queryBuilder=$this->createQueryBuilder('a');
        $queryBuilder->select('COUNT(a.dons) as value WHERE (a.centre=$value)');

        return $queryBuilder->getQuery()->getOneorNullResult();
        }
    }*/

 //   public function countAllDonsByCentre(){
        
        //$qb=$this->createQueryBuilder('d');
       /* $queryBuilder
                    ->innerJoin('App\Entity\Don', 'c', Join::WITH, 'c = d.don')
                    ;
*/
     /*   $Centre = 'Clinique essalem';

        $qb = $this->createQueryBuilder('d')
        ->select('d', 'centre', 'don')
        ->leftJoin('d.centre', 'centre')
        ->leftJoin('d.don', 'don')
        ->where('d.centre = :x')
        ->setParameter('x',$Centre)
        ->groupBy('d')*/
        /*->addGroupBy('d.centre') ;*/
         
        //COUNT(a.id) as value, 
    /*    return $qb->getQuery()->getResult();
       /* $query = $qb->getQuery();
        return $query->execute();
        
    }*/
    
    // /**
    //  * @return Donneur[] Returns an array of Donneur objects
    //  */
    
   /* public function findDonByCentre($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.centre = :val')
            ->setParameter('val', $value)
           // ->orderBy('d.id', 'ASC')
           // ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }*/
    

    
   /* public function findOneBySomeField($value): ?Donneur
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }*/
    
}
