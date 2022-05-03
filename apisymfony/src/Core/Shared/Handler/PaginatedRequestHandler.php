<?php

namespace App\Core\Shared\Handler;

use App\Core\Application\Abstraction\ViewModel\PaginatedEntityRequestViewModel;
use App\Core\Shared\Abstraction\Interface\IPaginatedRequestHandler;

class PaginatedRequestHandler implements IPaginatedRequestHandler   {

    private ?PaginatedEntityRequestViewModel $paginatedRequestViewModel;

    public function Handle($entity) {

            $this->paginatedRequestViewModel = new PaginatedEntityRequestViewModel($entity->query->all());
    }


    /**
     * Get the value of requestViewModel
     */ 
    public function getRequestViewModel() : PaginatedEntityRequestViewModel
    {
        return $this->paginatedRequestViewModel;
    }
}