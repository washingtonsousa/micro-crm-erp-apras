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
            $this->allowedFields = array('idProduto', 'nome', 'tamanho', 'codigoCliente');   
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

            if(trim($this->request->getTerm()) != '') {
                $array['nome'] = new QueryFilter('nome', $this->request->getTerm(), 'like');
                $array['strNome'] = new QueryFilter('strNome', $this->request->getTerm(), '=');
            }
      
            if(trim($params['codigoCliente']) != '') {
                $array['codigoCliente'] = new QueryFilter('codigoCliente', $params['codigoCliente'], '=');
            }

            return  $array;

        }

        protected function prepareQueryExpression()
        {
            $filters = $this->getAllowedFilters();

            $this->queryExpressionBuilder = new QueryExpressionBuilder('p');
           

       
                if(isset($filters['idProduto'])) {
                    $idProduto= $filters['idProduto'];
                    $this->queryExpressionBuilder->addORExpression($idProduto);
                }

                if(isset($filters['codigoCliente'])) {
                    $codCliente= $filters['codigoCliente'];
                    $this->queryExpressionBuilder->addORExpression($codCliente);
                }



            return $this->queryExpressionBuilder->build();

        }


}