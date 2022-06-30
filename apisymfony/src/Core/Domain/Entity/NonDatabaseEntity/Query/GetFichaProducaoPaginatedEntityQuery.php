<?php

namespace App\Core\Domain\Entity\NonDatabaseEntity\Query;

use App\Core\Domain\Abstraction\PaginatedEntityQuery;
use App\Core\Domain\Abstraction\PaginatedEntityRequest;
use App\Core\Domain\Entity\NonDatabaseEntity\QueryFilter;
use App\Core\Domain\Helper\QueryExpressionBuilder;

class GetFichaProducaoPaginatedEntityQuery extends PaginatedEntityQuery {

    private QueryExpressionBuilder $queryExpressionBuilder;

        public function __construct(PaginatedEntityRequest $request)
        {   
            $this->allowedFields = array('idFichaProducao', 'idPedido');   
            parent::__construct($request);
        }

        public  function getOrderByField() {

           $value =  parent::getOrderByField();

           $orderField = empty( $value ) ? 'idFichaProducao' :  $value ;

           return  $orderField;

        }


        protected function prepareQueryFilters()
        {   

            $array = array();
            $params = $this->getAllowedQueryParams();

            $array['idFichaProducao'] = new QueryFilter('idFichaProducao', $this->request->getTerm(), 'like');
            $array['idPedido'] = new QueryFilter('idPedido', $this->request->getTerm(), 'like');

            return  $array;

        }

        protected function prepareQueryExpression()
        {
            $filters = $this->getAllowedFilters();

            $filterIdFichaProducao= $filters['idFichaProducao'];
            $filterIdPedido= $filters['idPedido'];

            $this->queryExpressionBuilder = new QueryExpressionBuilder('f', $filterIdFichaProducao);
            
            $this->queryPedidoProdutoExpressionBuilder = new QueryExpressionBuilder('pP', $filterIdPedido);

            $this->queryExpressionBuilder->addORInnerBuildedExpression($this->queryPedidoProdutoExpressionBuilder->build());

            return $this->queryExpressionBuilder->build();

        }


}