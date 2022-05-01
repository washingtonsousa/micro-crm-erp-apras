<?php
namespace App\Core\Domain\Abstraction;

use App\Core\Domain\Entity\NonDatabaseEntity\QueryExpression;
use App\Core\Domain\Entity\NonDatabaseEntity\QueryFilter;

abstract class PaginatedEntityQuery {

        protected PaginatedEntityRequest $request;
        private $allowedFilters = array();
        private QueryExpression $queryExpression;
        protected $allowedFields = array();
        private $allowedQueryParams = array();
        
        
        public  function __construct(PaginatedEntityRequest $request)
        { 
               $this->request = $request;
               $this->removeNotAllowedFields();
               $this->allowedFilters = $this->prepareQueryFilters();
               $this->queryExpression = $this->prepareQueryExpression();
              
        }

        public function getOrderByField() {

                $defaultOrderValue =  '';
                $orderBy = $this->request->getOrderBy();
                $orderByValue =  !empty($orderBy) ? $orderBy : $defaultOrderValue;

                $isInArray = in_array($orderByValue, $this->allowedFields);

                if($isInArray) 
                    return $orderByValue;

                return  '';

        }

        private function removeNotAllowedFields() {

                $queryParams = $this->request->getQueryParams();
               
                foreach( $this->allowedFields as $allowed) {

                        if(array_key_exists($allowed, $queryParams)) {

                                $this->allowedQueryParams[$allowed]  =  $queryParams[$allowed];
                        } else {
                                $this->allowedQueryParams[$allowed] = '';
                        }
                       
                }

        }

        protected abstract function prepareQueryFilters();

        protected abstract function prepareQueryExpression();

        public function getQueryExpressions() {
            return $this->queryExpression;
        }


        /**
         * Get the value of request
         */ 
        public function getRequest()
        {
                return $this->request;
        }

        /**
         * Get the value of allowedFilters
         */ 
        public function getAllowedFilters()
        {
                return $this->allowedFilters;
        }

        /**
         * Get the value of allowedQueryParams
         */ 
        public function getAllowedQueryParams()
        {
                return $this->allowedQueryParams;
        }
}