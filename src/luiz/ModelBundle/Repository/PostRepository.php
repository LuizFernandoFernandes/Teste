<?php 

namespace luiz\ModelBundle\Repository;
use Doctrine\ORM\EntityRepository;

class PostRepository extends EntityRepository{


	private function getQueryBuilder()
	    {
	        $em = $this->getEntityManager();
	        $queryBuilder = $em->getRepository('luizModelBundle:Post')
	            ->createQueryBuilder('p');
	        return $queryBuilder;
	    }
	 
	     public function findAllInOrder()
	    {
	        $qb = $this->getQueryBuilder()
	            ->orderBy('p.createdAt', 'desc');
	 
	        return $qb->getQuery()->getResult();
	    }




}