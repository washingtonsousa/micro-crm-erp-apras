<?php
namespace App\Core\Domain\Repository;

use App\Core\Domain\Abstraction\Interface\IFichaProducaoRepository;
use App\Core\Domain\Abstraction\Interface\IPedidoRepository;
use App\Core\Domain\Entity\FichaProducao;
use App\Core\Domain\Entity\NonDatabaseEntity\PaginationAggregator;
use App\Core\Domain\Entity\NonDatabaseEntity\QueryExpression;
use App\Core\Domain\Entity\Pedido;
use App\Core\Domain\Helper\Doctrine\PaginationHelper;
use App\Core\Domain\Helper\QueryHelper;
use App\Core\Domain\Query\FichaProducaoQueryHelper;
use App\Core\Domain\Query\PedidoQueryHelper;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;

class FichaProducaoRepository  extends ServiceEntityRepository implements IFichaProducaoRepository {

    private ManagerRegistry $doctrine;
    private ObjectManager $manager;

            public function __construct(ManagerRegistry $doctrine)
            {
                $this->doctrine = $doctrine;
                $this->manager = $this->doctrine->getManager();
                parent::__construct($doctrine, FichaProducao::class);
            }

            public function get(QueryExpression $queryExpression, $pageSize = 0, $orderBy, $page = 0, $order = 'DESC', ) : PaginationAggregator {  

                $query = FichaProducaoQueryHelper::buildDefaultPaginatedQueryBuilder($this,$order, $orderBy);  
                $query = FichaProducaoQueryHelper::buildDefaultSelectForGetPageList($query);
                $query = QueryHelper::buildQueryFilters($query, $queryExpression);

                return PaginationHelper::executePaginationAggregator($query->getQuery(), $pageSize,$page);

            }

            public function getById($id) : ?FichaProducao {

                $query = FichaProducaoQueryHelper::buildDefaultPaginatedQueryBuilder($this);
                $query = FichaProducaoQueryHelper::buildDefaultSelectForGetPageList($query); 
                $query = $query->where('f.idFichaProducao = :idFichaProducao');

                return  $query->setParameter('idFichaProducao', $id) 
                    ->getQuery()   
                    ->getOneOrNullResult();

            }
        
}
