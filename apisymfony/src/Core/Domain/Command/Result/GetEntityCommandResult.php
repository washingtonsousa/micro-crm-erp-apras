<?php
namespace App\Core\Domain\Command\Result;

use App\Core\Domain\Entity\Cliente;
use App\Core\Domain\Entity\Usuario;
use Exception;

class GetEntityCommandResult {

    private mixed $entity;
    private ?Exception $ex;

    private function __construct()
    {
    }

    protected function setEntity(mixed $entity)
    {
        $this->entity = $entity;
    }

    protected function setException(?Exception $ex)
    {
        $this->ex = $ex;
    }

    public static function WithException(?Exception $ex) : GetEntityCommandResult  {
        $instance = new self();
        $instance->setException($ex);

        return   $instance;
    }

    public static function WithEntity(mixed $entity) : GetEntityCommandResult {
            $instance = new self();
            $instance->setEntity($entity);
            return   $instance;

    }

    public function getEntity() {
        return $this->entity;
    }

    public function isSuccess() {
        return $this->entity != null;
    }

}
