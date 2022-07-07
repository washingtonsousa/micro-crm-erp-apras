<?php

namespace App\Core\Domain\Service;

use App\Core\Domain\Abstraction\Interface\IPersistanceDomainService;
use App\Core\Domain\Abstraction\Interface\IUnityOfWork;
use App\Core\Domain\Command\PersistCommand;

class PersistanceDomainService implements IPersistanceDomainService {


    public function __construct(
        private IUnityOfWork $unityOfWork)
    {
            $this->unityOfWork = $unityOfWork;
    }


    public function persistEntity(mixed $entity): mixed {

             $command = new PersistCommand($entity, $this->unityOfWork);

                $result = $command->Execute();

                if($result->isSuccess())
                        return $result->getEntity();

                return null;  
    }

    public function removeEntity(mixed $entity): mixed {


           $this->unityOfWork->Remove($entity);

           $stmResult =  $this->unityOfWork->Commit();
   
           if($stmResult->isSuccess())
                   return true;

           return false;
}
}