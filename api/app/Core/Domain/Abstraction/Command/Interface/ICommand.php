<?php
namespace App\Core\Domain\Abstraction\Command\Interface;


interface ICommand {


    public function Execute() : mixed;


}
