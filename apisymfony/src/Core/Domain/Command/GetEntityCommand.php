<?php
namespace App\Core\Domain\Command;

use App\Core\Domain\Abstraction\Command\Command;
use App\Core\Domain\Abstraction\Command\Interface\IGetEntityCommand;
use App\Core\Domain\Abstraction\Interface\IGetIdentifiableEntityRepository;
use App\Core\Domain\Command\Result\GetEntityCommandResult;
use Exception;

class GetEntityCommand extends Command implements IGetEntityCommand {


    private int $id;
    private IGetIdentifiableEntityRepository $repo;

    public function __construct(int $id, IGetIdentifiableEntityRepository $repo)
    {
        parent::__construct();
        $this->id = $id;
        $this->repo =  $repo;
            
    }

    public  function  Execute(): GetEntityCommandResult
    {
        return parent::Execute();
    }

    public function GenerateResult() {

        try {
            
            $entity = $this->repo->getById($this->id);
            $this->setResult(GetEntityCommandResult::WithEntity($entity));


        } catch(Exception $ex) {
            var_dump($ex->getMessage());
            $this->setResult(GetEntityCommandResult::WithException($ex));
        }
    }

    public function ValidateResult() {
            //TODO
            return  $this->contract;
    }

}
