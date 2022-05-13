<?php

namespace App\Core\Domain\Entity\NonDatabaseEntity\Query;

use App\Core\Domain\Abstraction\PaginatedEntityQuery;
use App\Core\Domain\Abstraction\PaginatedEntityRequest;
use App\Core\Domain\Entity\NonDatabaseEntity\QueryFilter;
use App\Core\Domain\Helper\QueryExpressionBuilder;

class GetClientePaginatedEntityQuery extends PaginatedEntityQuery {

    private QueryExpressionBuilder $queryExpressionBuilder;

        public function __construct(PaginatedEntityRequest $request)
        {   
            $this->allowedFields = array('idCliente', 'strNome');   
            parent::__construct($request);
        }

        public  function getOrderByField() {

           $value =  parent::getOrderByField();

           $orderField = empty( $value ) ? 'idCliente' :  $value ;

           return  $orderField;

        }


        protected function prepareQueryFilters()
        {   

            $array = array();
            $params = $this->getAllowedQueryParams();

            $array['strNome'] = new QueryFilter('strNome', $this->request->getTerm(), 'like');

            return  $array;

        }

        protected function prepareQueryExpression()
        {
            $filters = $this->getAllowedFilters();
           
            foreach($filters as $filter) {

                if(isset($this->queryExpressionBuilder))
                $this->queryExpressionBuilder->addORExpression($filter, 'c');

                if(!isset(  $this->queryExpressionBuilder))
                $this->queryExpressionBuilder = new QueryExpressionBuilder($filter, 'c');
     
            }

            return $this->queryExpressionBuilder->build();

        }


}