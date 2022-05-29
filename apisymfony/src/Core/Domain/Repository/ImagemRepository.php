<?php
namespace App\Core\Domain\Repository;

use App\Core\Domain\Abstraction\Interface\IImagemRepository;
use App\Core\Domain\Entity\NonDatabaseEntity\PaginationAggregator;
use App\Core\Domain\Entity\NonDatabaseEntity\QueryExpression;
use App\Core\Domain\Entity\Imagem;
use App\Core\Domain\Helper\Doctrine\PaginationHelper;
use App\Core\Domain\Helper\QueryHelper;
use App\Core\Domain\Query\ImagemQueryHelper;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\AbstractQuery;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\User\UserInterface;

class ImagemRepository  extends ServiceEntityRepository implements IImagemRepository {

    private ManagerRegistry $doctrine;
    private ObjectManager $manager;

            public function __construct(ManagerRegistry $doctrine)
            {
                $this->doctrine = $doctrine;
                $this->manager = $this->doctrine->getManager();
                parent::__construct($doctrine, Imagem::class);
            }

            public function getById($id) : ?Imagem {

                return  $this->createQueryBuilder('i')
                ->select('i')
                ->where('u.idImagem = :idImagem')
                ->setParameter('idImagem', $id) 
                ->getQuery()   
                ->getOneOrNullResult();

            }
        
    

            public function checkIfExists(string $absoluthPath, string $nome) {

                $result = (int) $this->createQueryBuilder('i')
                ->select('COUNT(u.idImagem)')
                ->getQuery()
                ->getSingleScalarResult();

                return  $result  > 0;
            }

}
