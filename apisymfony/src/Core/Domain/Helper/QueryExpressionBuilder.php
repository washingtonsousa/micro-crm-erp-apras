<?php
namespace App\Core\Domain\Helper;

use App\Core\Domain\Entity\NonDatabaseEntity\QueryExpression;
use App\Core\Domain\Entity\NonDatabaseEntity\QueryFilter;

class QueryExpressionBuilder {

       private string $queryExpressionSTR;
       private string  $tableRef;
       private iterable $filters = array();

       public  function __construct(QueryFilter $filter, string $tableRef = 'c')
       {
           $this->tableRef = $tableRef;
           $this->init($filter);
       }

       private function init(QueryFilter $filter) {


            $this->queryExpressionSTR = $this->buildExpByQueryFilter($filter);
            $this->filters[] = $filter;
       }

       private function buildExpByQueryFilter(QueryFilter $filter) {

              $key = $filter->getKey();
              $operator = $filter->getOperator();
              $clause =   $this->tableRef.'.'.$key.' '.$operator.' :'.$key;
              $this->filters[] = $filter;
              return $clause;

       }

       public function addAndExpression(QueryFilter $filter) : QueryExpressionBuilder {

          $this->queryExpressionSTR .= ' AND ' . $this->buildExpByQueryFilter($filter);
          return $this;

       }

       public function addORExpression(QueryFilter $filter) : QueryExpressionBuilder {

              $this->queryExpressionSTR .= ' OR ' . $this->buildExpByQueryFilter($filter);
              return $this;
       }

       public function addANDInnerBuildedExpression(QueryExpression $exp) : QueryExpressionBuilder {

              $this->queryExpressionSTR .= ' AND ' . '('.$exp->getExpString().')';
              $this->filters[] = $exp->getQueryFilters();
              return $this;
       }

       public function addORInnerBuildedExpression(QueryExpression $exp) : QueryExpressionBuilder {

              $this->queryExpressionSTR .= ' OR ' . '('.$exp->getExpString().')';
              $this->filters[] = $exp->getQueryFilters();
              return $this;
       }

       /**
        * Get the value of queryExpressionSTR
        */ 
       public function build() : QueryExpression
       {
              return new QueryExpression($this->queryExpressionSTR,$this->filters);
       }
}