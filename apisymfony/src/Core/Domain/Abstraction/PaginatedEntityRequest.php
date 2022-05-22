<?php
namespace App\Core\Domain\Abstraction;

class PaginatedEntityRequest {

        private int $page;
        private int  $pageSize;
        private ?string $order;
        private ?string $orderBy;
        private ?string $term;

        private array $queryParams;

        public  function __construct()
        {
        }

        /**
         * Get the value of orderBy
         */ 
        public function getOrderBy()
        {
                return $this->orderBy;
        }

        /**
         * Get the value of order
         */ 
        public function getOrder()
        {
                return $this->order;
        }

        /**
         * Get the value of pageSize
         */ 
        public function getPageSize()
        {
                return $this->pageSize;
        }

        /**
         * Get the value of page
         */ 
        public function getPage()
        {
                return $this->page;
        }

        /**
         * Get the value of queryParams
         */ 
        public function getQueryParams() : array
        {
                return $this->queryParams;
        }

        /**
         * Get the value of term
         */ 
        public function getTerm()
        {
                return  $this->term == null || trim($this->term) == '' ? '' :  $this->term;
        }
}