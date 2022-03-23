<?php
namespace App\Core\Shared\EventListener;

use App\Core\Shared\Event\DomainNotificationContainer;
use App\Core\Shared\Event\DomainNotificationEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class DomainEventListener  implements EventSubscriberInterface {

    public DomainNotificationContainer $domainNotificationContainer;

    public function __construct(DomainNotificationContainer $container)
    {
        $this->domainNotificationContainer = $container;
    }

    public function notify(DomainNotificationEvent $event) {
      
        $this->domainNotificationContainer->Handle($event->getNotification());
    }
   
    public static function getSubscribedEvents(): array
    {
        return [
            DomainNotificationEvent::NAME => [
                ["notify"]
            ],
        ];
    }
}