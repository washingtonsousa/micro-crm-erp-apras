<?php
namespace App\Core\Shared\Event;

use App\Core\Shared\Model\DomainNotification;
use Symfony\Contracts\EventDispatcher\Event;

class DomainNotificationEvent extends Event {

    public const NAME = 'notification.emit';
    protected DomainNotification $domainNotification;

    public function __construct(DomainNotification $domainNotification)
    {
        $this->domainNotification = $domainNotification;
    }

    public  function getNotification()
    {
        return $this->domainNotification;
    }
}