<?php
namespace App\Core\Shared\Event;

use App\Core\Shared\Abstraction\Interface\IDomainNotificationContainer;
use App\Core\Shared\Abstraction\Interface\IHandler;
use App\Core\Shared\Model\DomainNotification;

class DomainNotificationContainer implements IDomainNotificationContainer, IHandler {

    private $notifications;

    public function __construct()
    {
        $this->notifications = array();
    }

    public function Handle($entity) {

        if($entity instanceof DomainNotification)
        $this->notifications[] = $entity;

    }

    public function HasNotifications(): bool
    {
        return count($this->notifications) > 0;
    }

    public function Notify() : mixed {
        return $this->notifications;
    }

}
