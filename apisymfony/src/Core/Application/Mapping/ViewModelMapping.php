<?php
namespace App\Core\Application\Mapping;

use App\Core\Application\Abstraction\ViewModel\PaginatedEntityRequestViewModel;
use App\Core\Application\Abstraction\ViewModel\Pagination\PaginationAggregatorViewModel;
use App\Core\Application\ViewModel\ClienteViewModel;
use App\Core\Application\ViewModel\PedidoViewModel;
use App\Core\Application\ViewModel\ProdutoViewModel;
use App\Core\Application\ViewModel\UsuarioViewModel;
use App\Core\Domain\Abstraction\PaginatedEntityRequest;
use App\Core\Domain\Entity\Cliente;
use App\Core\Domain\Entity\NonDatabaseEntity\PaginationAggregator;
use App\Core\Domain\Entity\Pedido;
use App\Core\Domain\Entity\Produto;
use App\Core\Domain\Entity\Usuario;
use AutoMapperPlus\Configuration\AutoMapperConfig;

class ViewModelMapping {


    public static function MapAll(AutoMapperConfig $config) {

        $config->registerMapping(UsuarioViewModel::class, Usuario::class);


        $config->registerMapping(Usuario::class, UsuarioViewModel::class)
        ->forMember('senha', function(Usuario $usuario) {
            
            return '';
        
        });


        $config->registerMapping(ClienteViewModel::class, Cliente::class);
        $config->registerMapping(Cliente::class, ClienteViewModel::class);


        $config->registerMapping(ProdutoViewModel::class, Produto::class);
        $config->registerMapping(Produto::class, ProdutoViewModel::class);


        $config->registerMapping(PedidoViewModel::class, Pedido::class);
        $config->registerMapping(Pedido::class, PedidoViewModel::class);

        $config->registerMapping(PaginatedEntityRequestViewModel::class, PaginatedEntityRequest::class);
        $config->registerMapping(PaginationAggregator::class, PaginationAggregatorViewModel::class);

    }


}