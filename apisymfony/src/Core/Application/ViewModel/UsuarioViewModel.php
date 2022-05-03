<?php
namespace  App\Core\Application\ViewModel;

use App\Core\Application\Abstraction\ViewModel\EntityViewModel;
use DateTime;

class UsuarioViewModel extends EntityViewModel {

    public $nome;
    public $email;
    public $senha;
    public $documento;  
    public $nivelAcesso;
    public ?DateTime $dataCriacao;  
    public ?DateTime $dataAtualizacao;

}
