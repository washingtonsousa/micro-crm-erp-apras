<?php
namespace App\Core\Domain\Contract;


use App\Core\Domain\Abstraction\Notifiable;
use App\Core\Shared\Event\AssertionConcern;

class Contract extends Notifiable {


            public function MustBeNull($value, $message) {

                $notification = AssertionConcern::AssertNull($value,$message);
                $this->notify($notification);
                return $this;
            }

            
            public function MustBeNotNull($value, $message) {

                $notification = AssertionConcern::AssertNotNull($value,$message);
                $this->notify( $notification);
                return $this;
            }

            public function MustBeIsset($value, $message) {

                $notification = AssertionConcern::AssertIsset($value,$message);
                $this->notify( $notification);
                return $this;
            }

            public function MustBeTrue($value, $message) {
                $notification = AssertionConcern::AssertTrue($value,$message);
                $this->notify( $notification);
                return $this;
            }

            public function MustBeFalse($value, $message) {
                $notification = AssertionConcern::AssertFalse($value,$message);
                $this->notify( $notification);
                return $this;
            }

}
