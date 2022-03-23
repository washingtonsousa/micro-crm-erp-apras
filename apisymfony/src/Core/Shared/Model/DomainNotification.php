<?php
namespace App\Core\Shared\Model;

use App\Core\Shared\Enum\RankEnum;

class DomainNotification {
    public $key;
    public $message;
    public $rank;



    public function __construct($key, $message, $rank = RankEnum::Low)
    {
        $this->key = $key;
        $this->message = $message;
        $this->rank = $rank;
    }
}
