<?php
namespace App\Core\Domain\Abstraction\Interface;

use App\Core\Domain\Entity\NonDatabaseEntity\StatementResult;

interface IUnityOfWork  {
    
    public function Commit() : StatementResult;

    public function  Remove(mixed $entity);

    public function  Persist(mixed $entity);

}