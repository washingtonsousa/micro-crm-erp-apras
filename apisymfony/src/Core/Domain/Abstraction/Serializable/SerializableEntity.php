<?php 

namespace App\Core\Domain\Abstraction\Serializable;

use JsonSerializable;

class SerializableEntity implements JsonSerializable {

    public function jsonSerialize()
    {
        $vars = get_object_vars($this);

        return $vars;
    }
}