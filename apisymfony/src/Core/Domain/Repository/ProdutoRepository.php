<?php
namespace App\Core\Domain\Repository;

use App\Core\Domain\Abstraction\Interface\IProdutoRepository;
use App\Core\Domain\Entity\NonDatabaseEntity\PaginationAggregator;
use App\Core\Domain\Entity\NonDatabaseEntity\QueryExpression;
use App\Core\Domain\Entity\Produto;
use App\Core\Domain\Helper\Doctrine\PaginationHelper;
use App\Core\Domain\Helper\QueryHelper;
use App\Core\Domain\Query\ProdutoQueryHelper;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;

class ProdutoRepository  extends ServiceEntityRepository implements IProdutoRepository {

    private ManagerRegistry $doctrine;
    private ObjectManager $manager;

            public function __construct(ManagerRegistry $doctrine)
            {
                $this->doctrine = $doctrine;
                $this->manager = $this->doctrine->getManager();
                parent::__construct($doctrine, Produto::class);
            }

            public function get(QueryExpression $queryExpression, $pageSize = 0, $orderBy, $page = 0, $order = 'DESC', ) : PaginationAggregator {  

                $query = ProdutoQueryHelper::buildDefaultPaginatedQueryBuilder($this,$order, $orderBy);
                $queryForCount  = ProdutoQueryHelper::buildDefaultPaginatedQueryBuilder($this,$order, $orderBy);
                
                $query = ProdutoQueryHelper::buildDefaultSelectForGetPageList($query);
                $totalItemsCount = (int) QueryHelper::buildQueryFiltersAndDoCount($queryForCount, $queryExpression, 'p.idProduto');

                $query = QueryHelper::buildQueryFilters($query, $queryExpression);

                return PaginationHelper::executePaginationAggregator($query->getQuery(), $pageSize,$page, $totalItemsCount);

            }

            public function getById($id) : ?Produto {

                return  $this->createQueryBuilder('p')
                ->select('p')
                ->where('p.idProduto = :idProduto')
                ->setParameter('idProduto', $id) 
                ->getQuery()   
                ->getOneOrNullResult();

            }
        
    

            public function checkIfExists(string $ean) {

                $result = (int) $this->createQueryBuilder('u')
                ->select('COUNT(u.idProduto)')
                ->where('u.ean = :ean')
                ->setParameter('ean', $ean)
                ->getQuery()
                ->getSingleScalarResult();

                return  $result  > 0;
            }

}
