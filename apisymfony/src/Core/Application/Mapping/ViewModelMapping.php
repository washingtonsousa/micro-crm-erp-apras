<?php
namespace App\Core\Application\Mapping;

use App\Core\Application\ViewModel\UsuarioViewModel;
use App\Core\Domain\Entity\Usuario;
use AutoMapperPlus\Configuration\AutoMapperConfig;

class ViewModelMapping {


    public static function MapAll(AutoMapperConfig $config) {
        $config->registerMapping(UsuarioViewModel::class, Usuario::class);
        $config->registerMapping(Usuario::class, UsuarioViewModel::class)
        ->forMember('senha', function(Usuario $usuario) {
            
            return '';
        
        });
    }


}