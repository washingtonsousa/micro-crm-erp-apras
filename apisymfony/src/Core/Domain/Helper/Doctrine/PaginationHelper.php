<?php
namespace App\Core\Domain\Helper\Doctrine;

use App\Core\Domain\Entity\NonDatabaseEntity\PaginationAggregator;
use Doctrine\ORM\Query;
use Doctrine\ORM\Tools\Pagination\Paginator;

    class PaginationHelper {


        public static function executePaginationAggregator(Query $query, $pageSize, $page, $totalItems) {


            $pageSize = $pageSize <= 0 ? $totalItems  : $pageSize;

            $page = $page <= 0 ? 1 : $page;

            if($totalItems <= 0)
            return new PaginationAggregator(array(),$totalItems,$page,1);

            $pagesCount = ceil($totalItems / $pageSize);
      
            $query
                ->setFirstResult($pageSize * ($page-1)) // set the offset
                ->setMaxResults($pageSize); // set the limit
            
            $items = $query->getResult();  


            return new PaginationAggregator($items,$totalItems,$page,$pagesCount);


        }


    }