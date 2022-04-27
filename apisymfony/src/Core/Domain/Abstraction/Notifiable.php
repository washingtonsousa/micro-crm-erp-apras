<?php 

namespace App\Core\Domain\Abstraction;

use App\Core\Shared\Event\DomainEvent;
use App\Core\Shared\Model\DomainNotification;

class Notifiable {

        protected $notifications;

        public function __construct()
        {
            $this->notifications = array();
        }

        protected function hasNotifications(): bool {
            return array_count_values($this->notifications) > 0;
        }

        protected function notify(?DomainNotification $notification) {

            if($notification != null)
               $this->notifications[] = $notification;

               DomainEvent::DomainEventHandle($notification);
        }


}