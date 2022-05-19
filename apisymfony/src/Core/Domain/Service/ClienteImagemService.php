<?php
namespace App\Core\Domain\Service;

use App\Core\Domain\Abstraction\Interface\IClienteImagemRepository;
use App\Core\Domain\Abstraction\Interface\IClienteImagemService;
use App\Core\Domain\Abstraction\Interface\IClienteRepository;
use App\Core\Domain\Abstraction\Interface\IImagemRepository;
use App\Core\Domain\Abstraction\Interface\IImagemService;
use App\Core\Domain\Abstraction\Interface\IUnityOfWork;
use App\Core\Domain\Command\GetEntityCommand;
use App\Core\Domain\Command\PersistCommand;
use App\Core\Domain\Entity\Cliente;
use App\Core\Domain\Entity\ClienteImagem;
use App\Core\Domain\Entity\Imagem;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ClienteImagemService implements IClienteImagemService {



    public function __construct(  private ParameterBagInterface $parameterBag, 
    private  IUnityOfWork $unityOfWork, private IClienteImagemRepository $imagemRepo)
    {
    }

        public function addOrUpdate(ClienteImagem $clienteImagem, UploadedFile $file) : ?ClienteImagem {
                
                $imagem = $clienteImagem->getImagem();
                
                $clienteImagemFromDb = $this->getByClienteId($clienteImagem->getIdCliente());

                if($clienteImagemFromDb != null)
                         $clienteImagem = $clienteImagemFromDb->UpdateImagem($imagem);                

                $fileSaved = $file->move($this->parameterBag->get('webDir').$imagem->getAbsolutPath(), $imagem->getNome());

                 $command = new PersistCommand($clienteImagem, $this->unityOfWork);

                 $result = $command->Execute();

                 if($result->isSuccess())
                         return $result->getEntity();

                return null;

        }




        public function getByClienteId(int $id) : ?ClienteImagem {
                
                $command = new GetEntityCommand($id, $this->imagemRepo);

                $result = $command->Execute();

                if($result->isSuccess())
                        return $result->getEntity();

                return null;
        }



}