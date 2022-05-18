<?php
namespace App\Core\Domain\Service;

use App\Core\Domain\Abstraction\Interface\IImagemRepository;
use App\Core\Domain\Abstraction\Interface\IImagemService;
use App\Core\Domain\Abstraction\Interface\IProdutoImagemService;
use App\Core\Domain\Abstraction\Interface\IUnityOfWork;
use App\Core\Domain\Command\GetEntityCommand;
use App\Core\Domain\Command\PersistCommand;
use App\Core\Domain\Entity\Imagem;
use App\Core\Domain\Entity\ProdutoImagem;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ProdutoImagemService implements IProdutoImagemService {

    private IImagemRepository $imagemRepo;
    private IUnityOfWork $unityOfWork;

    public function __construct(private ParameterBagInterface $parameterBag,
                                IUnityOfWork $unityOfWork, IImagemRepository $imagemRepo)
    {
            $this->unityOfWork = $unityOfWork;
            $this->imagemRepo = $imagemRepo;

    }


        public function add(ProdutoImagem $produtoImagem, UploadedFile $file): ?ProdutoImagem {
                
                $imagem = $produtoImagem->getImagem();

                $fileSaved = $file->move($this->parameterBag->get('webDir').$imagem->getAbsolutPath(), $imagem->getNome());

                $command = new PersistCommand($produtoImagem, $this->unityOfWork);

                $result = $command->Execute();

                if($result->isSuccess())
                        return $result->getEntity();

                return null;

        }



        public function getById(int $id) : ?Imagem {
                
                $command = new GetEntityCommand($id, $this->imagemRepo);

                $result = $command->Execute();

                if($result->isSuccess())
                        return $result->getEntity();

                return null;
        }



}