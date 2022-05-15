<?php

namespace App\Core\Domain\Entity\NonDatabaseEntity\Query;

use App\Core\Domain\Abstraction\PaginatedEntityQuery;
use App\Core\Domain\Abstraction\PaginatedEntityRequest;
use App\Core\Domain\Entity\NonDatabaseEntity\QueryFilter;
use App\Core\Domain\Helper\QueryExpressionBuilder;

class GetProdutoPaginatedEntityQuery extends PaginatedEntityQuery {

    private QueryExpressionBuilder $queryExpressionBuilder;

        public function __construct(PaginatedEntityRequest $request)
        {   
            $this->allowedFields = array('idProduto', 'nome');   
            parent::__construct($request);
        }

        public  function getOrderByField() {

           $value =  parent::getOrderByField();

           $orderField = empty( $value ) ? 'idProduto' :  $value ;

           return  $orderField;

        }


        protected function prepareQueryFilters()
        {   

            $array = array();
            $params = $this->getAllowedQueryParams();

            $array['nome'] = new QueryFilter('nome', $this->request->getTerm(), 'like');

            return  $array;

        }

        protected function prepareQueryExpression()
        {
            $filters = $this->getAllowedFilters();
           
            foreach($filters as $filter) {

                if(isset($this->queryExpressionBuilder))
                $this->queryExpressionBuilder->addORExpression($filter, 'p');

                if(!isset(  $this->queryExpressionBuilder))
                $this->queryExpressionBuilder = new QueryExpressionBuilder($filter, 'p');
     
            }

            return $this->queryExpressionBuilder->build();

        }


}