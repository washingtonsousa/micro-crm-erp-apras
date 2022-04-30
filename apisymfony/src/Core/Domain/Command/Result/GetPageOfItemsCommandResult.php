<?php
namespace App\Core\Domain\Command\Result;

use App\Core\Domain\Entity\NonDatabaseEntity\PaginationAggregator;

class GetPageOfItemsCommandResult {

    
    private ?PaginationAggregator $result;

    public function __construct(?PaginationAggregator $result)
    {
        $this->result = $result;
    }

    public function getPaginationResult() {
        return $this->result;
    }

    public function isSuccess() {
        return $this->result != null;
    }

}
