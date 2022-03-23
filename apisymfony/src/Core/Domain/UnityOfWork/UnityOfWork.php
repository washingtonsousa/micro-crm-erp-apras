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

        try {
            $time_pre = microtime(true);

            $this->manager->flush();

            $time_post = microtime(true);

            $exec_time = $time_post - $time_pre;

            return new StatementResult(true, $exec_time);
        } 
        
        catch(Exception $ex) {
            return new StatementResult(true, $exec_time, $ex);
        }

    }


}