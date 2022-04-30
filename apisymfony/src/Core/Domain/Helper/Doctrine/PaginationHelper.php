<?php
namespace App\Core\Domain\Helper\Doctrine;

use App\Core\Domain\Entity\NonDatabaseEntity\PaginationAggregator;
use Doctrine\ORM\Query;
use Doctrine\ORM\Tools\Pagination\Paginator;

    class PaginationHelper {


        public static function executePaginationAggregator(Query $query, $pageSize, $page) {

            
            $paginator = new Paginator($query);
            
            // you can get total items
            $totalItems = count($paginator);

          

            $pageSize = $pageSize <= 0 ? $totalItems  : $pageSize;

            $page = $page <= 0 ? 1 : $page;

            if($totalItems <= 0)
            return new PaginationAggregator(array(),$totalItems,$page,1);

            // get total pages
            $pagesCount = ceil($totalItems / $pageSize);
        
            // now get one page's items:
            $paginator
                ->getQuery()
                ->setFirstResult($pageSize * ($page-1)) // set the offset
                ->setMaxResults($pageSize); // set the limit
            
            $items = $paginator->getIterator();  

            return new PaginationAggregator($items,$totalItems,$page,$pagesCount);


        }


    }