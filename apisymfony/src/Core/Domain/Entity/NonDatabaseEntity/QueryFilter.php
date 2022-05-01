<?php
namespace App\Core\Domain\Entity\NonDatabaseEntity;
 
class QueryFilter {

    private string $key;
    private string | int $value;
    private string $operator;
    
    public function __construct(string $key, string | int $value, string $operator)
    {
        $this->key = $key;
        $this->value = strtolower($operator) == 'like' ? '%'.$value.'%' : $value;
        $this->operator = $operator;
    }

    /**
     * Get the value of key
     */ 
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Get the value of value
     */ 
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Get the value of operator
     */ 
    public function getOperator()
    {
        return $this->operator;
    }

}