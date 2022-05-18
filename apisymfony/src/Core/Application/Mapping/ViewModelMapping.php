<?php
namespace App\Core\Application\Mapping;

use App\Core\Application\Abstraction\ViewModel\PaginatedEntityRequestViewModel;
use App\Core\Application\Abstraction\ViewModel\Pagination\ClientePaginationAggregatorViewModel;
use App\Core\Application\Abstraction\ViewModel\Pagination\PaginationAggregatorViewModel;
use App\Core\Application\Abstraction\ViewModel\Pagination\ProdutoPaginationAggregatorViewModel;
use App\Core\Application\ViewModel\ClienteImagemViewModel;
use App\Core\Application\ViewModel\ClienteViewModel;
use App\Core\Application\ViewModel\ImagemViewModel;
use App\Core\Application\ViewModel\PedidoViewModel;
use App\Core\Application\ViewModel\ProdutoImagemViewModel;
use App\Core\Application\ViewModel\ProdutoViewModel;
use App\Core\Application\ViewModel\UsuarioViewModel;
use App\Core\Domain\Abstraction\PaginatedEntityRequest;
use App\Core\Domain\Entity\Cliente;
use App\Core\Domain\Entity\ClienteImagem;
use App\Core\Domain\Entity\Imagem;
use App\Core\Domain\Entity\NonDatabaseEntity\PaginationAggregator;
use App\Core\Domain\Entity\Pedido;
use App\Core\Domain\Entity\Produto;
use App\Core\Domain\Entity\ProdutoImagem;
use App\Core\Domain\Entity\Usuario;
use AutoMapperPlus\Configuration\AutoMapperConfig;
use AutoMapperPlus\MappingOperation\Operation;

class ViewModelMapping {


    static AutoMapperConfig $config;

    public static function MapAll(AutoMapperConfig $config) {

        self::$config = $config;

        $config->registerMapping(UsuarioViewModel::class, Usuario::class);

        $config->registerMapping(Usuario::class, UsuarioViewModel::class)
        ->forMember('senha', function(Usuario $usuario) {
            
            return '';
        
        });

        self::MapCliente();
        self::MapProduto();
      
        $config->registerMapping(ImagemViewModel::class, Imagem::class);
        $config->registerMapping(Imagem::class, ImagemViewModel::class);
        $config->registerMapping(PedidoViewModel::class, Pedido::class);
        $config->registerMapping(Pedido::class, PedidoViewModel::class);
        $config->registerMapping(PaginatedEntityRequestViewModel::class, PaginatedEntityRequest::class);
        $config->registerMapping(PaginationAggregator::class, PaginationAggregatorViewModel::class);

    }

    static function MapProduto() {


        self::$config->registerMapping(ProdutoPaginationAggregatorViewModel::class, PaginationAggregator::class)  ;

        self::$config->registerMapping(ProdutoViewModel::class, Produto::class);
        self::$config->registerMapping(Produto::class, ProdutoViewModel::class)
        ->forMember('produtoImagem', Operation::mapTo(ProdutoImagemViewModel::class));

        self::$config->registerMapping(PaginationAggregator::class, ProdutoPaginationAggregatorViewModel::class)
        ->forMember('items',  Operation::mapCollectionTo(ProdutoViewModel::class));

        self::$config->registerMapping(ProdutoImagemViewModel::class, ProdutoImagem::class);
        self::$config->registerMapping(ProdutoImagem::class, ProdutoImagemViewModel::class)
        ->forMember("imagem", Operation::mapTo(ImagemViewModel::class));


   
    }

    static function MapCliente() {

        self::$config->registerMapping(ClientePaginationAggregatorViewModel::class, PaginationAggregator::class)  ;

        self::$config->registerMapping(ClienteViewModel::class, Cliente::class);
        self::$config->registerMapping(Cliente::class, ClienteViewModel::class)
        ->forMember('clienteImagem', Operation::mapTo(ClienteImagemViewModel::class));

        self::$config->registerMapping(PaginationAggregator::class, ClientePaginationAggregatorViewModel::class)
        ->forMember('items',  Operation::mapCollectionTo(ClienteViewModel::class));

        self::$config->registerMapping(ClienteImagemViewModel::class, ClienteImagem::class);
        self::$config->registerMapping(ClienteImagem::class, ClienteImagemViewModel::class)
        ->forMember("imagem", Operation::mapTo(ImagemViewModel::class));

    }


}