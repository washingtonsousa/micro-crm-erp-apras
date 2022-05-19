<?php
namespace App\Core\Application\Service;

use App\Core\Application\Abstraction\Interface\IClienteImagemAppService;
use App\Core\Application\Abstraction\ViewModel\PaginatedEntityRequestViewModel;
use App\Core\Application\Abstraction\ViewModel\Pagination\PaginationAggregatorViewModel;
use App\Core\Application\ViewModel\ClienteImagemViewModel;
use App\Core\Application\ViewModel\ClienteViewModel;
use App\Core\Domain\Abstraction\Interface\IClienteImagemService;
use App\Core\Domain\Abstraction\Interface\IClienteService;
use App\Core\Domain\Abstraction\Interface\IImagemService;
use App\Core\Domain\Abstraction\PaginatedEntityRequest;
use App\Core\Domain\Entity\Cliente;
use App\Core\Domain\Entity\ClienteImagem;
use App\Core\Domain\Entity\Imagem;
use App\Core\Domain\Entity\NonDatabaseEntity\Query\GetClientePaginatedEntityQuery;
use App\Core\Shared\Constants\Constants;
use App\Core\Shared\Constants\MainConstants;
use App\Core\Shared\Mapper\AutoMapperInitializer;
use App\Core\Shared\Resolver\DependencyResolver;
use AutoMapperPlus\AutoMapperInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ClienteImagemAppService implements IClienteImagemAppService {

    protected AutoMapperInterface $mapper;


    public function __construct(private IClienteService $service,
  
    private IClienteImagemService $imagemService,
    private AutoMapperInitializer $mapperInitializer)
    {
        $this->mapper = $this->mapperInitializer->getMapper();
    }

    public function addOrUpdate($id, UploadedFile $file) : ?ClienteImagemViewModel {

        $cliente = $this->service->getById($id);

        if($cliente == null)
            return null;

        $imagem = new Imagem();

        $imagem->setNome("logo.".$file->getClientOriginalExtension());
        $imagem->setAbsolutPath(Constants::UploadDir."clientes/"."$id"."/");

        $clienteImagem = new ClienteImagem($cliente, $imagem);

        $result =  $this->imagemService->addOrUpdate($clienteImagem, $file);
    
        if($result == null)
             return null;

        $resultViewModel = $this->mapper->map($result , ClienteImagemViewModel::class);

        return  $resultViewModel;

    }

}
