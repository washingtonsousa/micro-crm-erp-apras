<?php
namespace App\Core\Domain\UseCase\Concrete;

use App\Core\Domain\Abstraction\Interface\IFichaProducaoService;
use App\Core\Domain\Abstraction\Interface\IUsuarioService;
use App\Core\Domain\Entity\FichaProducao;
use App\Core\Domain\UseCase\Abstractions\ICreateFichaProducaoUseCase;

class CreateFichaProducaoUseCase implements ICreateFichaProducaoUseCase {

  

    public function __construct(protected IUsuarioService $usuarioService,
    
    protected IFichaProducaoService $fichaService)
    {
    }

    public function Execute(FichaProducao $ficha): ?FichaProducao
    {
        
        $usuarioLogado = $this->usuarioService->getCurrentLoggedInUser();

        $ficha->setIdUsuarioCadastroFicha($usuarioLogado->idUsuario);

        $ficha->prepareForInsert();

        $ficha = $this->fichaService->subscribe($ficha);

        return $ficha;

    }


}