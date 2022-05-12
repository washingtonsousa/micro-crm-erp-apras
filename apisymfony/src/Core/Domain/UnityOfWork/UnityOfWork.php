<?php
namespace App\Core\Domain\UnityOfWork;

use App\Core\Domain\Abstraction\Interface\IUnityOfWork;
use App\Core\Domain\Entity\NonDatabaseEntity\StatementResult;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;
use Exception;

class UnityOfWork implements IUnityOfWork {

    private ObjectManager $manager;

            public function __construct(ManagerRegistry $doctrine)
            {
                $this->doctrine = $doctrine;
                $this->manager = $this->doctrine->getManager();
            }



    public function Commit() : StatementResult {
        $time_pre = microtime(true);

        try {

            

            $this->manager->flush();

            $time_post = microtime(true);

            $exec_time = $time_post - $time_pre;
           
            return new StatementResult(true, $exec_time);

        } 
        
        catch(Exception $ex) {
            
            $time_post = microtime(true);

            $exec_time = $time_post - $time_pre;

            $result = new StatementResult(true, $exec_time, $ex);

            return $result;
        }

    }


    public function Remove(mixed $entity) {

        return $this->manager->remove($entity);
    }
      
    public function Persist(mixed $entity) {

        return $this->manager->persist($entity);
    }


}