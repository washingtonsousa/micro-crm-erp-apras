<?php
namespace App\Core\Domain\Abstraction\Interface;


interface IPersistanceDomainService {

            public function persistEntity(mixed $entity) : mixed;
        
}