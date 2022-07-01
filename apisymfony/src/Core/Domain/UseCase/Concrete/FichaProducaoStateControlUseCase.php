<?php
namespace App\Core\Domain\UseCase\Concrete;

use App\Core\Domain\Abstraction\Interface\IFichaProducaoService;
use App\Core\Domain\Abstraction\Interface\IUnityOfWork;
use App\Core\Domain\Abstraction\Interface\IUsuarioService;
use App\Core\Domain\Command\PersistCommand;
use App\Core\Domain\Entity\FichaProducao;
use App\Core\Domain\Enum\FichaProducaoStatusEnum;
use App\Core\Domain\UseCase\Abstractions\IFichaProducaoStateControlUseCase;

class FichaProducaoStateControlUseCase implements IFichaProducaoStateControlUseCase {

  

    public function __construct(protected IUsuarioService $usuarioService, protected IUnityOfWork $unityOfWork,
    
    protected IFichaProducaoService $fichaService)
    {
    }

    public function Execute(FichaProducao $ficha): ?FichaProducao
    {
        
        $usuarioLogado = $this->usuarioService->getCurrentLoggedInUser();

        $fichaFromDb = $this->fichaService->getById($ficha->getIdFichaProducao());

        if($fichaFromDb->getEstadoFicha() == FichaProducaoStatusEnum::INICIAL)
        $fichaFromDb->setStateAsCorteSeparacao();

        $command = new PersistCommand($fichaFromDb, $this->unityOfWork);

        $result =  $command->Execute();

        return $fichaFromDb;

    }


}