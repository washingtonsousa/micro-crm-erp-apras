<?php
namespace App\Core\Domain\Entity\NonDatabaseEntity;


class PaginationAggregator {

        public $items;
        public $totalItems;
        public $page;
        public $totalPages;

        public function __construct($items, $totalItems, $page, $totalPages)
        {
            $this->items = $items;
            $this->totalItems = $totalItems;
            $this->page = $page;
            $this->totalPages = $totalPages;
        }


}