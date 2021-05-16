<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

Class UserRepository extends ServiceEntityRepository{
    
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function existe($email, $password) {
        $em = $this->getEntityManager();
        $dql = "SELECT COUNT(u.id) AS cant
                FROM App\Entity\User u
                WHERE u.email =:email AND u.password = :password";
        
        $query = $em->createQuery($dql);
        $query->setParameter('email', $email);
        $query->setParameter('password', $password);
        
        $cantidad = $query->getResult();
        
        return $cantidad[0]['cant'];
    }
}