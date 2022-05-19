<?php
namespace App\Core\Domain\Repository;

use App\Core\Domain\Abstraction\Interface\IClienteImagemRepository;
use App\Core\Domain\Abstraction\Interface\IClienteRepository;
use App\Core\Domain\Abstraction\Interface\IUsuarioRepository;
use App\Core\Domain\Entity\Cliente;
use App\Core\Domain\Entity\ClienteImagem;
use App\Core\Domain\Entity\Imagem;
use App\Core\Domain\Entity\NonDatabaseEntity\PaginationAggregator;
use App\Core\Domain\Entity\NonDatabaseEntity\QueryExpression;
use App\Core\Domain\Entity\Usuario;
use App\Core\Domain\Helper\Doctrine\PaginationHelper;
use App\Core\Domain\Helper\QueryHelper;
use App\Core\Domain\Query\ClienteQueryHelper;
use App\Core\Domain\Query\UsuarioQueryHelper;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\AbstractQuery;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\User\UserInterface;

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
