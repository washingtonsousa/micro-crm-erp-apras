<?php
namespace App\Core\Shared\Mapper;

use App\Core\Application\Mapping\ViewModelMapping;
use App\Core\Application\ViewModel\UsuarioViewModel;
use App\Core\Domain\Entity\Usuario;
use AutoMapperPlus\Configuration\AutoMapperConfig;
use AutoMapperPlus\AutoMapper;
use AutoMapperPlus\AutoMapperInterface;

class AutoMapperInitializer {

            private $mapper;    

            public function __construct()
            {
               $mapperinit = AutoMapper::initialize(function (AutoMapperConfig $config) {
                    // $config->registerMapping(Source::class, Destination::class);
                    // $config->registerMapping(AnotherSource::class, Destination::class);


                    ViewModelMapping::MapAll($config);

             
          
                });
                
                $this->mapper =  $mapperinit;
            }
               
            public function getMapper() : AutoMapperInterface {
                return $this->mapper;
            }


}
