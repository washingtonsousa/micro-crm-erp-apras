<?php
namespace App\Core\Application\ViewModel\Request;

use App\Core\Application\Abstraction\ViewModel\PaginatedEntityRequestViewModel;
use QueryFilter;

class UsuarioGetRequestViewModel  {

    private PaginatedEntityRequestViewModel $pageSpecs;

    public function __construct(array $queryParams)
    {
            $this->pageSpecs = new PaginatedEntityRequestViewModel($queryParams);
    }

    /**
     * Get the value of pageSpecs
     */ 
    public function getPageSpecs()
    {
        return $this->pageSpecs;
    }
}