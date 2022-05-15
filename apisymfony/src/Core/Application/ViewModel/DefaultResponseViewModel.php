<?php
namespace App\Core\Application\ViewModel;

use JsonSerializable;

class DefaultResponseViewModel   {
    public $data;
    public $message;

    public function __construct($data, $message)
    {
        $this->data = $data;
        $this->message = $message;
    }

}