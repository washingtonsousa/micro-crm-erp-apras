<?php
namespace App\Core\Application\Abstraction\ViewModel;

use ReflectionProperty;

class EntityViewModel {

    static function fromArray($thisIsArray){

        $instance = new static();

        foreach($thisIsArray as $key => $value) {

                if(property_exists($instance, $key)) {

                    $property = new ReflectionProperty($instance, $key);
                    $property->setValue($instance,$value);

                }

        }

        return $instance;
    }

    public function ToDomainModel() : mixed {

    }

}
