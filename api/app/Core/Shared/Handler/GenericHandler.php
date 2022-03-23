<?php

namespace App\Core\Shared\Handler;

use App\Core\Shared\Abstraction\Interface\IHandler;

class GenericHandler implements IHandler {


    public function Handle($object) {
        if($object instanceof string)
        echo $object;
    }

}
