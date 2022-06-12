<?php
namespace App\Core\Domain\Service;

use App\Core\Domain\Abstraction\Interface\IProdutoRepository;
use App\Core\Domain\Abstraction\Interface\IProdutoService;
use App\Core\Domain\Abstraction\Interface\IUnityOfWork;
use App\Core\Domain\Command\GetEntityCommand;
use App\Core\Domain\Command\GetPageOfItemsCommand;
use App\Core\Domain\Command\PersistCommand;
use App\Core\Domain\Entity\NonDatabaseEntity\PaginationAggregator;
use App\Core\Domain\Entity\NonDatabaseEntity\Query\GetProdutoPaginatedEntityQuery;
use App\Core\Domain\Entity\Produto;

class ProdutoService implements IProdutoService {

    private IProdutoRepository $produtoRepo;
    private IUnityOfWork $unityOfWork;

    public function __construct(
                                IUnityOfWork $unityOfWork, IProdutoRepository $produtoRepo)
    {
            $this->unityOfWork = $unityOfWork;
            $this->produtoRepo = $produtoRepo;

    }



        public function CheckIfExists(Produto $produto) : ?bool {
                

                        // $command = new CheckIfUserExistsCommand($produto, $this->produtoRepo);

                        // $result = $command->Execute();

                        // if($result->isSuccess())
                        //         return $result->getResult();

                        return null;

        }

       public function remove($id) : bool {

                $produtoForUpdate = $this->getById($id); 

                if($produtoForUpdate == null)
                        return false;

                $this->unityOfWork->Remove($produtoForUpdate);

                $stmResult =  $this->unityOfWork->Commit();
        
                if($stmResult->isSuccess())
                        return true;

                return false;
        }


        public function update(Produto $produto, $id, $changeSenha = false) {

                $produtoForUpdate = $this->getById($id); 
                
                //$produtoForUpdate->fullUpdate($produto);


                $command = new PersistCommand($produtoForUpdate, $this->unityOfWork);

                $result = $command->Execute();

                if($result->isSuccess())
                        return $result->getEntity();

                return null;
        }

        public function subscribe(Produto $produto) {
                

                // if(!ProdutoSpecification::MustNotExists($this->CheckIfExists($produto)))
                //     return null;


                $command = new PersistCommand($produto, $this->unityOfWork);

                $result = $command->Execute();


                if($result->isSuccess())
                        return $result->getEntity();

                return null;

        }


        public function get(GetProdutoPaginatedEntityQuery $paginatedQuery) : PaginationAggregator {

                
                $command = new GetPageOfItemsCommand($this->produtoRepo, $paginatedQuery);

                $result = $command->Execute();

                if($result->isSuccess())
                        return $result->getPaginationResult();

                return null;
        }


        public function getById(int $id) : ?Produto {
                
                $command = new GetEntityCommand($id, $this->produtoRepo);

                $result = $command->Execute();

                if($result->isSuccess())
                        return $result->getEntity();

                return null;
        }





}