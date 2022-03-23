<?php
namespace App\Core\Domain\Entity\NonDatabaseEntity;

use Exception;

class StatementResult {


    public bool $success;
    public string $elapsed;
    public Exception $exception;

    public function __construct(bool $success, string $elapsed, Exception $ex = null)
    {
        $this->success = $ex != null ? false : $success;
        $this->elapsed = $elapsed;
        $this->exception = $ex;
    }



}