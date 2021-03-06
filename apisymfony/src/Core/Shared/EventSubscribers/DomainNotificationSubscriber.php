<?php
namespace App\Core\Shared\EventSubscribers;

use App\Core\Application\ViewModel\DefaultResponseViewModel;
use App\Core\Shared\Event\DomainNotificationContainer;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class DomainNotificationSubscriber implements EventSubscriberInterface {

    public DomainNotificationContainer $domainNotificationContainer;

    public function __construct(DomainNotificationContainer $container)
    {
        $this->domainNotificationContainer = $container;
    }

    public function onKernelResponse(ResponseEvent  $event)
    {
        $headers = $event->getResponse()->headers;

        $response = $event->getResponse();

        $headers->set("Content-Type", "application/json");

        if($this->domainNotificationContainer->HasNotifications()) {
            
            $data = $this->domainNotificationContainer->Notify();
            $response->setStatusCode(400);
            $message =  "Erros ou redirecionamentos ocorreram no processamento de sua requisição";
            $responseData = new  DefaultResponseViewModel($data, $message);
            $contentString = json_encode($responseData);
            $response->setContent($contentString);
        }

    }

    public static function getSubscribedEvents()
    {
        return array(
            KernelEvents::RESPONSE => array( 'onKernelResponse', 1 ),
        );
    }
}