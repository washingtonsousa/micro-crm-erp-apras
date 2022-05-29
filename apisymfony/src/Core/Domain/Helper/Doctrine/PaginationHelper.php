<?php
namespace App\Core\Domain\Helper\Doctrine;

use App\Core\Domain\Entity\NonDatabaseEntity\PaginationAggregator;
use Doctrine\ORM\Query;
use Doctrine\ORM\Tools\Pagination\Paginator;

    class PaginationHelper {


        public static function executePaginationAggregator(Query $query, $pageSize, $page) {

            $pageSize = $pageSize <= 0 ? 4  : $pageSize;

            $page = $page <= 0 ? 1 : $page;

            $firstResult = $page == 1 ? 0 : $pageSize * ($page - 1);
            $pageSizeOffset = $pageSize;           

            $query
                ->setFirstResult($firstResult) // set the offset
                ->setMaxResults($pageSizeOffset); // set the limit

            $paginator = new \Doctrine\ORM\Tools\Pagination\Paginator($query);

            $items = $paginator->getIterator()->getArrayCopy();  

            $pagesCount  = ceil($paginator->count() / $pageSize);

            return new PaginationAggregator($items,$paginator->count(),$page,$pagesCount);


        }


    }