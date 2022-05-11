<?php
namespace App\Core\Application\Mapping;

use App\Core\Application\Abstraction\ViewModel\PaginatedEntityRequestViewModel;
use App\Core\Application\Abstraction\ViewModel\Pagination\PaginationAggregatorViewModel;
use App\Core\Application\ViewModel\Pagination\UsuarioPaginationResponseViewModel;
use App\Core\Application\ViewModel\UsuarioViewModel;
use App\Core\Domain\Abstraction\PaginatedEntityRequest;
use App\Core\Domain\Entity\NonDatabaseEntity\PaginationAggregator;
use App\Core\Domain\Entity\NonDatabaseEntity\Query\GetUsuarioPaginatedEntityQuery;
use App\Core\Domain\Entity\Usuario;
use AutoMapperPlus\Configuration\AutoMapperConfig;

class ViewModelMapping {


    public static function MapAll(AutoMapperConfig $config) {

        $config->registerMapping(UsuarioViewModel::class, Usuario::class);


        $config->registerMapping(Usuario::class, UsuarioViewModel::class)
        ->forMember('senha', function(Usuario $usuario) {
            
            return '';
        
        });

        $config->registerMapping(PaginatedEntityRequestViewModel::class, PaginatedEntityRequest::class);
        $config->registerMapping(PaginationAggregator::class, PaginationAggregatorViewModel::class);

    }


}