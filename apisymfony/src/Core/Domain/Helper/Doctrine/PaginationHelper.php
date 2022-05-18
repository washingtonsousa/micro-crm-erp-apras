<?php
namespace App\Core\Domain\Helper\Doctrine;

use App\Core\Domain\Entity\NonDatabaseEntity\PaginationAggregator;
use Doctrine\ORM\Query;
use Doctrine\ORM\Tools\Pagination\Paginator;

    class PaginationHelper {


        public static function executePaginationAggregator(Query $query, $pageSize, $page, $totalItems) {


            $pageSize = $pageSize <= 0 ? $totalItems  : $pageSize;

            $page = $page <= 0 ? 1 : $page;

            $firstResult = $page == 1 ? 0 : $pageSize * ($page - 1);
            $pageSizeOffset = $page == 1 ?  $pageSize :  $pageSize + 1;

            if($totalItems <= 0)
            return new PaginationAggregator(array(),$totalItems,$page,1);

            $pagesCount = ceil($totalItems / $pageSize);
    

            $query
                ->setFirstResult($firstResult) // set the offset
                ->setMaxResults($pageSizeOffset); // set the limit
            
            $items = $query->getResult(\Doctrine\ORM\Query::HYDRATE_OBJECT);  

            return new PaginationAggregator($items,$totalItems,$page,$pagesCount);


        }


    }