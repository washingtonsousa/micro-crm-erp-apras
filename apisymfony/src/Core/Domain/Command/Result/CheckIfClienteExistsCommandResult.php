<?php
namespace App\Core\Domain\Command\Result;


class CheckIfClienteExistsCommandResult {

    private ?bool $result;

    public function __construct(?bool $result)
    {
        $this->result = $result;
    }

    public function getResult() {
        return $this->result;
    }

    public function isSuccess() {
         
        return isset($this->result);
    }

}
