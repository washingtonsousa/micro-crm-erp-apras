<?php
namespace App\Core\Domain\Abstraction\Command\Interface;

use App\Core\Domain\Abstraction\Command\Interface\ICommand;
use App\Core\Domain\Command\Result\GetEntityCommandResult;
use Exception;
use App\Core\Domain\Contract\Contract;

interface IGetEntityCommand  {


    public function Execute() : GetEntityCommandResult;


}
