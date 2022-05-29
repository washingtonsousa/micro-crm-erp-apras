<?php
namespace App\Core\Domain\Repository;

use App\Core\Domain\Abstraction\Interface\IClienteRepository;
use App\Core\Domain\Abstraction\Interface\IUsuarioRepository;
use App\Core\Domain\Entity\Cliente;
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

class ClienteRepository  extends ServiceEntityRepository implements IClienteRepository {

    private ManagerRegistry $doctrine;
    private ObjectManager $manager;

            public function __construct(ManagerRegistry $doctrine)
            {
                $this->doctrine = $doctrine;
                $this->manager = $this->doctrine->getManager();
                parent::__construct($doctrine, Cliente::class);
            }

            public function get(QueryExpression $queryExpression, $pageSize = 0, $orderBy, $page = 0, $order = 'DESC', ) : PaginationAggregator {  

                $query = ClienteQueryHelper::buildDefaultPaginatedQueryBuilder($this,$order, $orderBy);
                
                $query = ClienteQueryHelper::buildDefaultSelectForGetPageList($query);

                $query = QueryHelper::buildQueryFilters($query, $queryExpression);
            
               return PaginationHelper::executePaginationAggregator($query->getQuery(), $pageSize,$page);

            }

            public function getById($id) : ?Cliente {

                return  $this->createQueryBuilder('c')
                ->select('c','img', 'i')
                ->leftJoin('c.clienteImagem', 'i')
                ->leftJoin('i.imagem', 'img')
                ->where('c.idCliente = :idCliente')
                ->setParameter('idCliente', $id) 
                ->getQuery()   
                ->getOneOrNullResult();

            }

           
            public function checkIfExists(string $strNome) {

                $result = (int) $this->createQueryBuilder('u')
                ->select('COUNT(u.idCliente)')
                ->where('u.strNome = :strNome')
                ->setParameter('strNome', $strNome)
                ->getQuery()
                ->getSingleScalarResult();

                return  $result  > 0;
            }

}
