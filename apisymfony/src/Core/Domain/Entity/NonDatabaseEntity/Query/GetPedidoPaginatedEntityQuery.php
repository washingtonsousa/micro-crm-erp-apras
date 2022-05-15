<?php

namespace App\Core\Domain\Entity\NonDatabaseEntity\Query;

use App\Core\Domain\Abstraction\PaginatedEntityQuery;
use App\Core\Domain\Abstraction\PaginatedEntityRequest;
use App\Core\Domain\Entity\NonDatabaseEntity\QueryFilter;
use App\Core\Domain\Helper\QueryExpressionBuilder;

class GetPedidoPaginatedEntityQuery extends PaginatedEntityQuery {

    private QueryExpressionBuilder $queryExpressionBuilder;

        public function __construct(PaginatedEntityRequest $request)
        {   
            $this->allowedFields = array('idPedido');   
            parent::__construct($request);
        }

        public  function getOrderByField() {

           $value =  parent::getOrderByField();

           $orderField = empty( $value ) ? 'idPedido' :  $value ;

           return  $orderField;

        }


        protected function prepareQueryFilters()
        {   

            $array = array();
            $params = $this->getAllowedQueryParams();

            $array['idPedido'] = new QueryFilter('idPedido', $params['idPedido'], '=');

            return  $array;

        }

        protected function prepareQueryExpression()
        {
            $filters = $this->getAllowedFilters();
           
            foreach($filters as $filter) {

                if(isset($this->queryExpressionBuilder))
                $this->queryExpressionBuilder->addANDExpression($filter, 'p');

                if(!isset(  $this->queryExpressionBuilder))
                $this->queryExpressionBuilder = new QueryExpressionBuilder($filter, 'p');
     
            }

            return $this->queryExpressionBuilder->build();

        }


}