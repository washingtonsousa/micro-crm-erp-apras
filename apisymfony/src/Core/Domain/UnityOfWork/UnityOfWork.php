<?php
namespace App\Core\Domain\UnityOfWork;

use App\Core\Domain\Abstraction\Interface\IUnityOfWork;
use App\Core\Domain\Entity\NonDatabaseEntity\StatementResult;
use App\Core\Shared\Resolver\DependencyResolver;
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
        $logger =  DependencyResolver::make('app.logger');
        try {

            

            $this->manager->flush();

            $time_post = microtime(true);

            $exec_time = $time_post - $time_pre;
            $result = new StatementResult(true, $exec_time);

            $logger->info("{ CommitLog : ".json_encode($result)."}");
    

            return $result;

        } 
        
        catch(Exception $ex) {
            
            $time_post = microtime(true);

            $exec_time = $time_post - $time_pre;

            $result = new StatementResult(true, $exec_time, $ex);
                $logger->info("{ CommitLog : ".json_encode($result)."}");

            return $result;
        }

    }


    public function Remove(mixed $entity) {

        $logger =  DependencyResolver::make('app.logger');

        try   {
            $logger->info("{ RemoveUnityOfWorkInfo : 'success'");

            return $this->manager->remove($entity);
        }

        catch(Exception $ex) {

            $logger->info("{ RemoveUnityOfWorkInfo : ".json_encode($ex)."}");

            return null;
        }
       
    }
      
    public function Persist(mixed $entity) {

        return $this->manager->persist($entity);
    }


}