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
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ProdutoImagemService implements IProdutoImagemService {

    private IImagemRepository $imagemRepo;
    private IUnityOfWork $unityOfWork;

    public function __construct(
                                IUnityOfWork $unityOfWork, IImagemRepository $imagemRepo)
    {
            $this->unityOfWork = $unityOfWork;
            $this->imagemRepo = $imagemRepo;

    }


    public function CheckIfExists(Imagem $imagem, UploadedFile $file) : ?bool {
                

                        // $command = new CheckIfUserExistsCommand($imagem, $this->imagemRepo);

                        // $result = $command->Execute();

                        // if($result->isSuccess())
                        //         return $result->getResult();

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


        public function update(Imagem $imagem, $id) {

                $imagemForUpdate = $this->getById($id); 
                
                //$imagemForUpdate->fullUpdate($imagem);

                $command = new PersistCommand($imagemForUpdate, $this->unityOfWork);

                $result = $command->Execute();

                if($result->isSuccess())
                        return $result->getEntity();

                return null;
        }

        public function add(ProdutoImagem $imagem, UploadedFile $file): ?ProdutoImagem {
                

                $command = new PersistCommand($imagem, $this->unityOfWork);

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