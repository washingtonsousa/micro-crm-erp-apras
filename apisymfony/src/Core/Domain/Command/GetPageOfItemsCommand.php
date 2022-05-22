<?php
namespace App\Core\Domain\Command;

use App\Core\Domain\Abstraction\Command\Command;
use App\Core\Domain\Abstraction\Interface\IPaginatedRepository;
use App\Core\Domain\Abstraction\PaginatedEntityQuery;
use App\Core\Domain\Command\Result\GetPageOfItemsCommandResult;
use Exception;

class GetPageOfItemsCommand extends Command {


    private IPaginatedRepository $paginatedRepository;
    private PaginatedEntityQuery $paginatedRequestedModel;

    public function __construct(IPaginatedRepository $paginatedRepository, PaginatedEntityQuery $paginatedRequestedModel)
    {
        parent::__construct();
        $this->paginatedRepository = $paginatedRepository;
        $this->paginatedRequestedModel = $paginatedRequestedModel;
    }

    public function GenerateResult() {

        try {
            

            
           $pagination = $this->paginatedRepository->get(
        
           $this->paginatedRequestedModel->getQueryExpressions(), 
           $this->paginatedRequestedModel->getRequest()->getPageSize(), 
           $this->paginatedRequestedModel->getOrderByField(),
           $this->paginatedRequestedModel->getRequest()->getPage(),
           $this->paginatedRequestedModel->getRequest()->getOrder()); 
           $this->setResult(new GetPageOfItemsCommandResult($pagination));


        } catch(Exception $ex) {
            

            var_dump($ex->getMessage());
            $this->setResult(new GetPageOfItemsCommandResult(null));
        }
    }

    public function ValidateResult() {
            //TODO
            return  $this->contract;//->MustBeNotNull($this->getResult()->getUser(), "Ocorreu um problema ao tentar cadastrar o usuário, consulte logs para maiores detalhes");
    }

}
