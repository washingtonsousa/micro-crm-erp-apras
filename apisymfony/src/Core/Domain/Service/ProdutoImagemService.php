<?php
namespace App\Core\Domain\Service;


use App\Core\Domain\Abstraction\Interface\IProdutoImagemRepository;
use App\Core\Domain\Abstraction\Interface\IProdutoImagemService;
use App\Core\Domain\Abstraction\Interface\IUnityOfWork;
use App\Core\Domain\Command\GetEntityCommand;
use App\Core\Domain\Command\PersistCommand;
use App\Core\Domain\Entity\ProdutoImagem;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ProdutoImagemService implements IProdutoImagemService {



    public function __construct(private ParameterBagInterface $parameterBag,
    private   IUnityOfWork $unityOfWork,private IProdutoImagemRepository $imagemRepo)
    {
            $this->unityOfWork = $unityOfWork;
            $this->imagemRepo = $imagemRepo;

    }


        public function add(ProdutoImagem $produtoImagem, UploadedFile $file): ?ProdutoImagem {
                
                $imagem = $produtoImagem->getImagem();

                $produtoImagemFromDb = $this->getByProdutoId($produtoImagem->getIdProduto());

                if($produtoImagemFromDb != null)
                         $produtoImagem = $produtoImagemFromDb->UpdateImagem($imagem);  

                $fileSaved = $file->move($this->parameterBag->get('webDir').$imagem->getAbsolutPath(), $imagem->getNome());

                $command = new PersistCommand($produtoImagem, $this->unityOfWork);

                $result = $command->Execute();

                if($result->isSuccess())
                        return $result->getEntity();

                return null;

        }



        public function getByProdutoId(int $id) : ?ProdutoImagem {
                
                $command = new GetEntityCommand($id, $this->imagemRepo);

                $result = $command->Execute();

                if($result->isSuccess())
                        return $result->getEntity();

                return null;
        }



}