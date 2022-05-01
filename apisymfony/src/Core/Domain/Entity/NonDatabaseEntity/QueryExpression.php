<?php

namespace App\Core\Domain\Entity\NonDatabaseEntity;


class QueryExpression {
    
    private string $expString;
    private iterable $queryFilters;

    public function __construct(string $expString, iterable $queryFilters)
    {
        $this->expString = $expString;
        $this->queryFilters = $queryFilters;

    }

    /**
     * Get the value of queryFilters
     */ 
    public function getQueryFilters()
    {
        return $this->queryFilters;
    }

    /**
     * Get the value of expString
     */ 
    public function getExpString()
    {
        return $this->expString;
    }
}