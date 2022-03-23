<?php
namespace App\Core\Domain\Abstraction\Command;

use App\Core\Domain\Abstraction\Command\Interface\ICommand;
use Exception;

abstract class Command implements ICommand {

    private $contract;
    private  $commandResult;

    public function getResult() {
        return $this->commandResult;
    }

    protected function setResult($result) {
        $this->commandResult = $result;
    }

    public function Execute() : mixed {

        $this->GenerateResult();

        if($this->commandResult == null)
          throw new Exception("A command must have always a result");

        $this->contract = $this->ValidateResult();

        return $this->commandResult;
    }


    protected abstract function GenerateResult();
    protected abstract function ValidateResult();

}
