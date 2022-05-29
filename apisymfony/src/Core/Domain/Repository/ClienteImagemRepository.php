<?php
namespace App\Core\Domain\Repository;

use App\Core\Domain\Abstraction\Interface\IClienteImagemRepository;
use App\Core\Domain\Entity\ClienteImagem;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;

class ClienteImagemRepository  extends ServiceEntityRepository implements IClienteImagemRepository {

    private ManagerRegistry $doctrine;
    private ObjectManager $manager;

            public function __construct(ManagerRegistry $doctrine)
            {
                $this->doctrine = $doctrine;
                $this->manager = $this->doctrine->getManager();
                parent::__construct($doctrine, ClienteImagem::class);
            }

    

            public function getById($id) : ?ClienteImagem {

                return  $this->createQueryBuilder('ci')
                ->select('ci')
                ->where('ci.idCliente = :idCliente')
                ->setParameter('idCliente', $id) 
                ->getQuery()   
                ->getOneOrNullResult();

            }

          

}
