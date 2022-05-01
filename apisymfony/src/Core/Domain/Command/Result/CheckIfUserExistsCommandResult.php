<?php
namespace App\Core\Domain\Command\Result;

use App\Core\Domain\Entity\Usuario;

class CheckIfUserExistsCommandResult {

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
