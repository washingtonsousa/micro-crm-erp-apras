<?php
namespace App\Core\Shared\Abstraction\Interface;


interface IDomainNotificationContainer {

    public function HasNotifications() : bool;

public function Notify() : mixed;

}
