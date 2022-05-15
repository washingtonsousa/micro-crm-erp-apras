<?php
namespace App\Core\Domain\Repository;

use App\Core\Domain\Abstraction\Interface\IPedidoRepository;
use App\Core\Domain\Entity\NonDatabaseEntity\PaginationAggregator;
use App\Core\Domain\Entity\NonDatabaseEntity\QueryExpression;
use App\Core\Domain\Entity\Pedido;
use App\Core\Domain\Helper\Doctrine\PaginationHelper;
use App\Core\Domain\Helper\QueryHelper;
use App\Core\Domain\Query\PedidoQueryHelper;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;

class PedidoRepository  extends ServiceEntityRepository implements IPedidoRepository {

    private ManagerRegistry $doctrine;
    private ObjectManager $manager;

            public function __construct(ManagerRegistry $doctrine)
            {
                $this->doctrine = $doctrine;
                $this->manager = $this->doctrine->getManager();
                parent::__construct($doctrine, Pedido::class);
            }

            public function get(QueryExpression $queryExpression, $pageSize = 0, $orderBy, $page = 0, $order = 'DESC', ) : PaginationAggregator {  

                $query = PedidoQueryHelper::buildDefaultPaginatedQueryBuilder($this,$order, $orderBy);
                $queryForCount  = PedidoQueryHelper::buildDefaultPaginatedQueryBuilder($this,$order, $orderBy);
                
                $query = PedidoQueryHelper::buildDefaultSelectForGetPageList($query);
                $totalItemsCount = (int) QueryHelper::buildQueryFiltersAndDoCount($queryForCount, $queryExpression, 'p.idPedido');

                $query = QueryHelper::buildQueryFilters($query, $queryExpression);

                return PaginationHelper::executePaginationAggregator($query->getQuery(), $pageSize,$page, $totalItemsCount);

            }

            public function getById($id) : ?Pedido {

                return  $this->createQueryBuilder('p')
                ->select('p')
                ->where('p.idPedido = :idPedido')
                ->setParameter('idPedido', $id) 
                ->getQuery()   
                ->getOneOrNullResult();

            }
        
    

            public function checkIfExists(string $ean) {

                $result = (int) $this->createQueryBuilder('u')
                ->select('COUNT(u.idPedido)')
                ->where('u.ean = :ean')
                ->setParameter('ean', $ean)
                ->getQuery()
                ->getSingleScalarResult();

                return  $result  > 0;
            }

}
