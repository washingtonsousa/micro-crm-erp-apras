<?php
namespace App\Core\Domain\Command\Result;

use App\Core\Domain\Entity\Usuario;

class PersistCommandResult {

    private mixed $entity;

    public function __construct(mixed $entity)
    {
        $this->entity = $entity;
    }

    public function getEntity() {
        return $this->entity;
    }

    public function isSuccess() {
        return $this->entity != null;
    }

}
