<?php
namespace  App\Core\Application\ViewModel;

use App\Core\Application\Abstraction\ViewModel\EntityViewModel;
use App\Core\Domain\Entity\Usuario;
use DateTime;

class UsuarioViewModel extends EntityViewModel {

    public $nome;
    public $email;
    public $senha;
    public $documento;  
    public $nivelAcesso;

    public function ToDomainModel() : Usuario {

            $user = new Usuario();
            $user->setSenha($this->senha);
            $user->setEmail($this->email);
            $user->setNome($this->nome);
            $user->setNivelAcesso($this->nivelAcesso);
            $user->setDocumento($this->documento);
            $user->setStatus(true);
            $user->setDataAtualizacao(new DateTime());
            return $user;

    }

}
