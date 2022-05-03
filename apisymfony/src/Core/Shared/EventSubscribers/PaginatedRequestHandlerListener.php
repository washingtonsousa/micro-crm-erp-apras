<?php
namespace App\Core\Shared\EventSubscribers;

use App\Core\Shared\Abstraction\Interface\IPaginatedRequestHandler;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class PaginatedRequestHandlerListener implements EventSubscriberInterface {

    public IPaginatedRequestHandler $handler;

    public function __construct(IPaginatedRequestHandler $handler)
    {
        $this->handler = $handler;
    }

    public function onKernelRequest(RequestEvent  $event)
    {

        if(strtolower($event->getRequest()->getMethod()) == "get")    
        $this->handler->Handle($event->getRequest());
        

    }

    public static function getSubscribedEvents()
    {
        return array(
            KernelEvents::REQUEST => array( 'onKernelRequest', 0 ),
        );
    }
}