<?php
namespace App\Core\Shared\Event;

use App\Core\Shared\Enum\RankEnum;
use App\Core\Shared\Model\DomainNotification;
use App\Core\Shared\Event\DomainEvent;

class AssertionConcern {


    public static function  IsSatisfiedBy($validations)
    {

      $notificationsNotNull = array_filter($validations, fn($value) => !is_null($value));


      AssertionConcern::NotifyAll($notificationsNotNull);

      return count($notificationsNotNull) === 0;

    }

    private  static function NotifyAll($notificationsNotNull)
    {

        foreach($notificationsNotNull as $notification) {
            DomainEvent::DomainEventHandle($notification);
        }
    }

    public static function AssertLength(string $stringValue, int $minimum, int $maximum, string $message, string $key = "AssertArgumentLength") : mixed
    {
       $length = strlen(trim($stringValue));

      return ($length < $minimum || $length > $maximum)
          ? new DomainNotification($key, $message)
          : null;
    }

    public static function AssertListLength(array $list, int $minimum, string $message, string $key = "AssertArgumentLength", $rank = RankEnum::Low)
    {
      return ($list == null || count($list) <= $minimum)
          ? new DomainNotification($key, $message, $rank)
          : null;
    }

    public static function AssertMatches(string $pattern, string $stringValue, string $message, string $key = "AssertArgumentLength")
    {

      return (!preg_match($pattern, $stringValue))
          ? new DomainNotification($key, $message)
          : null;
    }

    public static function AssertNotEmpty(string $stringValue, string $message, string $key = "AssertArgumentNotEmpty")
    {

      

      return ($stringValue == null || strlen(trim($stringValue)) == 0)
          ? new DomainNotification($key, $message)
          : null;
    }

    public static function AssertIsset(mixed $object1 , string $message, string $key = "AssertArgumentIsset", $rank = RankEnum::Low)
    {

      return !isset($object1)
          ? new DomainNotification($key, $message, $rank)
          : null;
    }

    public static function AssertNotNull(mixed $object1 , string $message, string $key = "AssertArgumentNotNull", $rank = RankEnum::Low)
    {
      return (empty($object1))
          ? new DomainNotification($key, $message, $rank)
          : null;
    }

        public static function AssertNull(mixed $object1 , string $message, string $key = "AssertArgumentNotNull", $rank = RankEnum::Low)
        {
            return ($object1  != null)
                ? new DomainNotification($key, $message, $rank)
                : null;
        }

        public static function AssertTrue(bool $boolValue, string $message, string $key = "AssertArgumentTrue",$rank = RankEnum::Low)
    {
      return (!$boolValue)
          ? new DomainNotification($key, $message, $rank)
          : null;
    }

    public static function AssertFalse(bool $boolValue, string$message, string $key = "AssertArgumentTrue",  $rank = RankEnum::Low)
    {
      return ($boolValue)
          ? new DomainNotification($key, $message, $rank)
          : null;
    }

    public static function AssertGenericException(string $message, string $key = "AssertArgumentGenericException")
    {
      return ($message != null && $message != "")
          ? new DomainNotification($key, $message)
          : null;
    }

}

