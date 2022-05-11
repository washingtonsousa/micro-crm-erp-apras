<?php
namespace App\Core\Application\Abstraction\ViewModel\Pagination;

class PaginationAggregatorViewModel {

    public int $totalItems;
    public int $page;
    public int $totalPages;
    public mixed $items;
}