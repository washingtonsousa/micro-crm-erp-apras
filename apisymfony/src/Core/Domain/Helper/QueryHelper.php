<?php
namespace App\Core\Domain\Helper;

use App\Core\Domain\Entity\NonDatabaseEntity\QueryExpression;
use Doctrine\ORM\Query;
use Doctrine\ORM\QueryBuilder;

class QueryHelper {


        public static function buildQueryFilters(QueryBuilder $query, QueryExpression $queryExp) {

            if(empty($queryExp->getExpString()))
            return $query;

                $query->where($queryExp->getExpString()); 

                $filters = $queryExp->getQueryFilters();

                    foreach ($filters as $filter) {

                        $key = $filter->getKey();
                        $value = $filter->getValue();
                        $query->setParameter(':'.$key,  $value); 

                    }  


        
            return $query;
        }


        public static function buildQueryFiltersAndDoCount(QueryBuilder $query, QueryExpression $queryExp, $countField) {
        
            return (int) self::buildQueryFilters($query, $queryExp)
            ->select('COUNT('.$countField.')')
            ->getQuery()->getSingleScalarResult();
        }

} 