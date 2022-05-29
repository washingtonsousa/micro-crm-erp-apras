<?php
namespace App\Core\Domain\Entity\NonDatabaseEntity;


class PaginationAggregator {
        
        public mixed $items;
        public int $totalItems;
        public int $page;
        public int $totalPages;

        public function __construct($items, $totalItems, $page, $totalPages)
        {
            $this->items = $items;
            $this->totalItems = $totalItems;
            $this->page = $page;
            $this->totalPages = $totalPages;
        }


}