<?php
namespace App\Core\Domain\Abstraction\Interface;

use App\Core\Domain\Abstraction\PaginatedEntityQuery;
use App\Core\Domain\Entity\NonDatabaseEntity\PaginationAggregator;

interface IMultiEntityPaginationAggregatorService {

    public function get(PaginatedEntityQuery $paginatedQuery, IPaginatedRepository $paginatedRepository): PaginationAggregator;

}