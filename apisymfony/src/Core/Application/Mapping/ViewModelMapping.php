<?php
namespace App\Core\Application\Mapping;

use App\Core\Application\Abstraction\ViewModel\PaginatedEntityRequestViewModel;
use App\Core\Application\Abstraction\ViewModel\Pagination\ClientePaginationAggregatorViewModel;
use App\Core\Application\Abstraction\ViewModel\Pagination\PaginationAggregatorViewModel;
use App\Core\Application\ViewModel\ClienteImagemViewModel;
use App\Core\Application\ViewModel\ClienteViewModel;
use App\Core\Application\ViewModel\ImagemViewModel;
use App\Core\Application\ViewModel\PedidoViewModel;
use App\Core\Application\ViewModel\ProdutoViewModel;
use App\Core\Application\ViewModel\UsuarioViewModel;
use App\Core\Domain\Abstraction\PaginatedEntityRequest;
use App\Core\Domain\Entity\Cliente;
use App\Core\Domain\Entity\ClienteImagem;
use App\Core\Domain\Entity\Imagem;
use App\Core\Domain\Entity\NonDatabaseEntity\PaginationAggregator;
use App\Core\Domain\Entity\Pedido;
use App\Core\Domain\Entity\Produto;
use App\Core\Domain\Entity\Usuario;
use App\Core\Shared\Resolver\DependencyResolver;
use AutoMapperPlus\Configuration\AutoMapperConfig;
use AutoMapperPlus\DataType;
use AutoMapperPlus\MappingOperation\Operation;

class ViewModelMapping {


    public static function MapAll(AutoMapperConfig $config) {


        $config->registerMapping(UsuarioViewModel::class, Usuario::class);

        $config->registerMapping(Usuario::class, UsuarioViewModel::class)
        ->forMember('senha', function(Usuario $usuario) {
            
            return '';
        
        });

        $config->registerMapping(ClientePaginationAggregatorViewModel::class, PaginationAggregator::class)  ;

        $config->registerMapping(ClienteViewModel::class, Cliente::class);
        $config->registerMapping(Cliente::class, ClienteViewModel::class)
        ->forMember('clienteImagens', Operation::mapCollectionTo(ClienteImagemViewModel::class));

        $config->registerMapping(PaginationAggregator::class, ClientePaginationAggregatorViewModel::class)
        ->forMember('items',  Operation::mapCollectionTo(ClienteViewModel::class));

        $config->registerMapping(ClienteImagemViewModel::class, ClienteImagem::class);
        $config->registerMapping(ClienteImagem::class, ClienteImagemViewModel::class)
        ->forMember("imagem", Operation::mapTo(ImagemViewModel::class));

        $config->registerMapping(ImagemViewModel::class, Imagem::class);
        $config->registerMapping(Imagem::class, ImagemViewModel::class);

        $config->registerMapping(ProdutoViewModel::class, Produto::class);
        $config->registerMapping(Produto::class, ProdutoViewModel::class);

        $config->registerMapping(PedidoViewModel::class, Pedido::class);
        $config->registerMapping(Pedido::class, PedidoViewModel::class);

        $config->registerMapping(PaginatedEntityRequestViewModel::class, PaginatedEntityRequest::class);
        $config->registerMapping(PaginationAggregator::class, PaginationAggregatorViewModel::class);

    }


}