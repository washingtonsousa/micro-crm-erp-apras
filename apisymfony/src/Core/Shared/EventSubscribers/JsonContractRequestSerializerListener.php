<?php
namespace App\Core\Shared\EventSubscribers;

use App\Core\Shared\Abstraction\Interface\IPaginatedRequestHandler;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ControllerArgumentsEvent;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class JsonContractRequestSerializerListener implements EventSubscriberInterface {


    public function __construct()
    {
      
    }

    public function onKernelControllerArguments(ControllerArgumentsEvent  $event)
    {

        //var_dump($event->getArguments()[0]);
        

    }

    public static function getSubscribedEvents()
    {
        return array(
            KernelEvents::CONTROLLER_ARGUMENTS => array( 'onKernelControllerArguments', 0 ),
        );
    }
}