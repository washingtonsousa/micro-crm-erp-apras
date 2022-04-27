<?php
namespace App\Core\Shared\Event;

use App\Core\Shared\Handler\HandlerAggregator;
use App\Core\Shared\Resolver\DependencyResolver;
use Illuminate\Support\Facades\App;

class DomainEvent {


    public static function DomainEventHandle($object) {

       $handlers = DependencyResolver::make("domain_notification_container");


        $handlers->Handle($object);


    }


}
