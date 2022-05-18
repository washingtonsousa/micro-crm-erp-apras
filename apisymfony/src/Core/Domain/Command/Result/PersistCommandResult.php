<?php
namespace App\Core\Domain\Command\Result;

use App\Core\Domain\Entity\Usuario;

class PersistCommandResult {

    private mixed $entity;
    private mixed $statmentResult;

    public function __construct(mixed $entity, mixed $statmentResult)
    {
        $this->entity = $entity;
        $this->statmentResult = $statmentResult;

    }

    public function getEntity() {
        return $this->entity;
    }

    public function isSuccess() {
        return $this->entity != null;
    }


    /**
     * Get the value of statmentResult
     */ 
    public function getStatmentResult()
    {
        return $this->statmentResult;
    }
}
