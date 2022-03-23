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

        $responseData = new  DefaultResponseViewModel("processado com sucesso", json_decode($response->getContent()));

        if($this->domainNotificationContainer->HasNotifications())
        $responseData = new DefaultResponseViewModel(
            "Erros ocorreram no processamento de sua requisição",
            $this->domainNotificationContainer->Notify()
        );

        $response->setContent($response->getContent());
    }

    public static function getSubscribedEvents()
    {
        return array(
            KernelEvents::RESPONSE => array( 'onKernelResponse', 0 ),
        );
    }
}