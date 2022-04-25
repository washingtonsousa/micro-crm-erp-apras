<?php
namespace  App\Core\Application\ViewModel;

use App\Core\Application\Abstraction\ViewModel\EntityViewModel;
use App\Core\Domain\Entity\Usuario;

class UsuarioViewModel extends EntityViewModel {

    public $name;
    public $email;
    public $password;
    public $document;  
    public $gender;
    public $birthday;

    

    public function ToDomainModel() : Usuario {

            $user = new Usuario();
            $user->setSenha($this->password);
            $user->setEmail($this->email);
            $user->setNome($this->name);
            $user->setNivelAcesso('ROLE_ADMIN');
            $user->setDocumento($this->document);
            $user->setStatus(true);
            return $user;

    }

}
