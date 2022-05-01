<?php

namespace App\Core\Domain\Entity\NonDatabaseEntity\Query;

use App\Core\Domain\Abstraction\PaginatedEntityQuery;
use App\Core\Domain\Abstraction\PaginatedEntityRequest;
use App\Core\Domain\Entity\NonDatabaseEntity\QueryFilter;
use App\Core\Domain\Helper\QueryExpressionBuilder;

class GetUsuarioPaginatedEntityQuery extends PaginatedEntityQuery {

    private QueryExpressionBuilder $queryExpressionBuilder;

        public function __construct(PaginatedEntityRequest $request)
        {   
            $this->allowedFields = array('idUsuario', 'nome', 'documento', 'email');   
            parent::__construct($request);
        }

        public  function getOrderByField() {

           $value =  parent::getOrderByField();

           $orderField = empty( $value ) ? 'idUsuario' :  $value ;

           return  $orderField;

        }


        protected function prepareQueryFilters()
        {   

            $array = array();
            $params = $this->getAllowedQueryParams();

            $array['nome'] = new QueryFilter('nome', $params['nome'], 'like');
            $array['email'] = new QueryFilter('email', $params['email'], 'like');
            $array['documento'] = new QueryFilter('documento', $params['documento'], 'like');

            return  $array;

        }

        protected function prepareQueryExpression()
        {
            $filters = $this->getAllowedFilters();
           
            foreach($filters as $filter) {

                if(isset(  $this->queryExpressionBuilder))
                $this->queryExpressionBuilder->addAndExpression($filter, 'u');

                if(!isset(  $this->queryExpressionBuilder))
                $this->queryExpressionBuilder = new QueryExpressionBuilder($filter, 'u');
     
            }

            return $this->queryExpressionBuilder->build();

        }


}