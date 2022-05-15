<?php
namespace App\Core\Shared\EventSubscribers;

use App\Core\Application\ViewModel\DefaultResponseViewModel;
use App\Core\Shared\Event\DomainNotificationContainer;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class ResponseDataSubscriber implements EventSubscriberInterface {

    public DomainNotificationContainer $domainNotificationContainer;

    public function __construct(DomainNotificationContainer $container)
    {
        $this->domainNotificationContainer = $container;
    }

    public function onKernelResponse(ResponseEvent  $event)
    {
        $headers = $event->getResponse()->headers;

        $response = $event->getResponse();

        $responseStrData = $event->getResponse()->getContent();

        $data = json_decode($responseStrData, false);

        if($data == false)
          return;
        
        if(!$event->getResponse()->isSuccessful())
        return;
        
        $headers->set("Content-Type", "application/json");

        if($this->domainNotificationContainer->HasNotifications())
           return;

       $isEmpty = get_object_vars($data) ? FALSE : TRUE;

       $method = $event->getRequest()->getMethod();

        $isNotFoundEntityContext = $method == 'GET' && $isEmpty;

        $message = $isNotFoundEntityContext ? "Não retornou resultados" : "Processado com sucesso";

        $responseData = new DefaultResponseViewModel($data,  $message);

        $contentString = json_encode($responseData, true);

        $response->setContent($contentString);


    }

    public static function getSubscribedEvents()
    {
        return array(
            KernelEvents::RESPONSE => array( 'onKernelResponse', 0 ),
        );
    }
}