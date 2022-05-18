<?php
namespace App\Core\Application\Service;

use App\Core\Application\Abstraction\Interface\IProdutoAppService;
use App\Core\Application\Abstraction\Interface\IProdutoImagemAppService;
use App\Core\Application\Abstraction\ViewModel\PaginatedEntityRequestViewModel;
use App\Core\Application\Abstraction\ViewModel\Pagination\PaginationAggregatorViewModel;
use App\Core\Application\ViewModel\ProdutoImagemViewModel;
use App\Core\Application\ViewModel\ProdutoViewModel;
use App\Core\Domain\Abstraction\Interface\IProdutoImagemService;
use App\Core\Domain\Abstraction\Interface\IProdutoService;
use App\Core\Domain\Abstraction\PaginatedEntityRequest;
use App\Core\Domain\Entity\Imagem;
use App\Core\Domain\Entity\Produto;
use App\Core\Domain\Entity\NonDatabaseEntity\Query\GetProdutoPaginatedEntityQuery;
use App\Core\Domain\Entity\ProdutoImagem;
use App\Core\Shared\Constants\Constants;
use App\Core\Shared\Mapper\AutoMapperInitializer;
use AutoMapperPlus\AutoMapperInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ProdutoImagemAppService implements IProdutoImagemAppService {


   
    protected AutoMapperInterface $mapper;


    public function __construct(private IProdutoService $service,
    private AutoMapperInitializer $mapperInitializer,  private IProdutoImagemService $imagemService)
    {
        $this->mapper = $mapperInitializer->getMapper();
    }

    public function add(int $id, UploadedFile $file) : ?ProdutoImagemViewModel {

        $produto = $this->service->getById($id);

        if($produto == null)
            return null;

        $imagem = new Imagem();
        $imagem->setNome("produtoImg.".$file->getClientOriginalExtension());
        $imagem->setAbsolutPath(Constants::UploadDir."produtos/"."$id"."/");

        $produtoImagem = new ProdutoImagem($produto, $imagem);

        $result =  $this->imagemService->add($produtoImagem, $file);
    
        if($result == null)
             return null;

        $resultViewModel = $this->mapper->map($result , ProdutoImagemViewModel::class);

        return  $resultViewModel;
    }


}
