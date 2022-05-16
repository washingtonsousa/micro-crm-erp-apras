<?php
namespace App\Core\Domain\Service;

use App\Core\Domain\Abstraction\Interface\IClienteImagemService;
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
    private  IUnityOfWork $unityOfWork, private IImagemRepository $imagemRepo)
    {
    }


    public function CheckIfExists(Cliente $idCliente) : ?bool {
                

        // $command = new CheckIfUserExistsCommand($user, $this->userRepo);

        // $result = $command->Execute();

        // if($result->isSuccess())
             //    return $result->getResult();

        return null;
   }


       public function remove($id) : bool {

                $imagemForUpdate = $this->getById($id); 

                if($imagemForUpdate == null)
                        return false;

                $this->unityOfWork->Remove($imagemForUpdate);

                $stmResult =  $this->unityOfWork->Commit();
        
                if($stmResult->isSuccess())
                        return true;

                return false;
        }


        public function update(ClienteImagem $imagem, UploadedFile $file) {

                //$imagemForUpdate = $this->getById($id); 
                
                //$imagemForUpdate->fullUpdate($imagem);

               // $command = new PersistCommand($imagemForUpdate, $this->unityOfWork);

               // $result = $command->Execute();

               // if($result->isSuccess())
                 //       return $result->getEntity();

                return null;
        }

        public function add(ClienteImagem $clienteImagem, UploadedFile $file) : ?ClienteImagem {
                
                $imagem = $clienteImagem->getImagem();

                $fileSaved = $file->move($this->parameterBag->get('webDir').$imagem->getAbsolutPath(), $imagem->getNome());

                $command = new PersistCommand($clienteImagem, $this->unityOfWork);

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