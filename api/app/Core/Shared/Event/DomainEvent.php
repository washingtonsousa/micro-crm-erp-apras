<?php
namespace App\Core\Shared\Event;

use App\Core\Shared\Handler\HandlerAggregator;
use Illuminate\Support\Facades\App;

class DomainEvent {


    public static function DomainEventHandle($object) {

       $handlers = App::make(HandlerAggregator::class);


        $handlers->Handle($object);


    }


}
