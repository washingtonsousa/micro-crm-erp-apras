<?php
namespace App\Core\Shared\Handler;

use App\Core\Shared\Abstraction\Interface\IHandler;

class HandlerAggregator   {

    public $handlers;

    public function __construct($handlers)
    {
        $this->handlers = $handlers;
    }

    public function Handle($object) {
        foreach($this->handlers as $handler) {
            $handler->handle($object);
        }
    }

}
