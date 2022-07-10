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
            $this->allowedFields = array('idFichaProducao', 'estadoFicha', 'idCliente', 'idPedido', 'strNome', 'idProduto');   
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


            if($this->request->getTerm() != '')
                $array['idFichaProducao'] = new QueryFilter('idFichaProducao', $this->request->getTerm(), 'like');

            
            if($this->request->getTerm() != '') {
                $array['idPedido'] = new QueryFilter('idPedido', $this->request->getTerm(), '=');
                $array['idProduto'] = new QueryFilter('idProduto', $this->request->getTerm(), '=');
            }

            if($this->request->getTerm() != '') {
                $array['strNome'] = new QueryFilter('strNome', $this->request->getTerm(), 'like');
            }

            if(isset($params['idCliente']) && $params['idCliente'] != '')
                $array['idCliente'] = new QueryFilter('idCliente', $params['idCliente'], '=');

            if(isset($params['estadoFicha']) && $params['estadoFicha'] != '') 
                $array['estadoFicha'] = new QueryFilter('estadoFicha', $params['estadoFicha'], '=');

            return  $array;

        }

        protected function prepareQueryExpression()
        {
            $filters = $this->getAllowedFilters();
            $this->queryExpressionBuilder = new QueryExpressionBuilder('f', null);

            if(isset($filters['idFichaProducao'])) {
                $filterIdFichaProducao= $filters['idFichaProducao'];
                $this->queryExpressionBuilder->addORExpression($filterIdFichaProducao);
            }

            if(isset($filters['estadoFicha'])) {
                $this->queryExpressionBuilder->addORExpression($filters['estadoFicha']);
            }

            if(isset($filters['idPedido'])) {
                $filterIdPedido= $filters['idPedido'];
                $this->queryPedidoExpressionBuilder = new QueryExpressionBuilder('p', $filterIdPedido);
                $this->queryExpressionBuilder->addORInnerBuildedExpression($this->queryPedidoExpressionBuilder->build());
            }

            if(isset($filters['idCliente'])) {
                $filterIdCliente= $filters['idCliente'];
                $this->queryClienteExpressionBuilder = new QueryExpressionBuilder('c', $filterIdCliente);
                $this->queryExpressionBuilder->addORInnerBuildedExpression($this->queryClienteExpressionBuilder->build());
            }
            
            if(isset($filters['idProduto'])) {
                $filterIdProduto= $filters['idProduto'];
                $this->queryPedidoProdutoExpressionBuilder = new QueryExpressionBuilder('pP', $filterIdProduto);
                $this->queryExpressionBuilder->addORInnerBuildedExpression($this->queryPedidoProdutoExpressionBuilder->build());
            }  
            
            if(isset($filters['strNome'])) {
                $filterNomeCliente= $filters['strNome'];
                $this->queryNomeCliente = new QueryExpressionBuilder('c', $filterNomeCliente);
                $this->queryExpressionBuilder->addORInnerBuildedExpression($this->queryNomeCliente->build());
            }    
        
            return isset($this->queryExpressionBuilder) ? $this->queryExpressionBuilder->build() : null;

        }


}