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

            $array['idPedido'] = new QueryFilter('idPedido', $this->request->getTerm(), 'like');

            if($this->request->getTerm() != '') {
                $array['idProduto'] = new QueryFilter('idProduto', $this->request->getTerm(), '=');
            }

            if($this->request->getTerm() != '') {
                $array['strNome'] = new QueryFilter('strNome', $this->request->getTerm(), 'like');
            }

            return $array;

        }

        protected function prepareQueryExpression()
        {
            $filters = $this->getAllowedFilters();

            $this->queryExpressionBuilder = new QueryExpressionBuilder('p', $filters['idPedido']);


            if(isset($filters['strNome'])) {
                $filterNomeCliente= $filters['strNome'];
                $this->queryNomeCliente = new QueryExpressionBuilder('c', $filterNomeCliente);
                $this->queryExpressionBuilder->addORInnerBuildedExpression($this->queryNomeCliente->build());
            }  

            return $this->queryExpressionBuilder->build();

        }


}