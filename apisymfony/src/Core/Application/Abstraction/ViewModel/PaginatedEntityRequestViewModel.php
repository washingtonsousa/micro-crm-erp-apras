<?php
namespace App\Core\Application\Abstraction\ViewModel;

use Exception;
use ReflectionClass;

class PaginatedEntityRequestViewModel {


        protected int $page = 1;
        protected int  $pageSize = 10;
        protected ?string $order = "desc";
        protected ?string $orderBy = null;
        protected ?string $term = "";
        protected $queryParams = array();

        public function __construct(array $queryParams)
        {
            $this->init($queryParams);
        }

        private function initNonPaginationQueryParams(array $queryParams) {

            $reflectionClass = new ReflectionClass($this::class);

            foreach($queryParams as $key => $param) {

                $property = null;

                try   {

                    $property = $reflectionClass->getProperty($key);

                } catch(Exception) {

                }

               if($property == null && $param != null) :
                    $this->queryParams[$key] = $param;
               endif;
            }
        }

        private function initPageSpecs(array $queryParams) {
            $pageValue = isset($queryParams["page"]) ? $queryParams["page"] :  1;
            $this->page = (int) $pageValue <= 0 ? $this->page : $pageValue;
            $this->pageSize = $queryParams["pageSize"] != null ? $queryParams["pageSize"] : $this->pageSize;
            $orderValue = isset($queryParams["order"]) ? $queryParams["order"] : $this->order;
            $this->order = trim(strtolower($orderValue)) != "desc" &&  trim(strtolower($orderValue)) != "asc" ? $this->order :  $orderValue;
            $this->orderBy = isset($queryParams["orderBy"]) ? $queryParams["orderBy"] : $this->orderBy;
            $this->term = isset($queryParams["term"]) ? $queryParams["term"] : $this->term;

            
        }

        private function init(array $queryParams) {

                if($queryParams == null)
                    return;

                $this->initNonPaginationQueryParams($queryParams);
                $this->initPageSpecs($queryParams);

        }


}