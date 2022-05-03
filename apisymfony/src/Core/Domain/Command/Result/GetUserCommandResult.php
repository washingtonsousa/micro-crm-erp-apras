<?php
namespace App\Core\Domain\Command\Result;

use App\Core\Domain\Entity\Usuario;
use Exception;

class GetUserCommandResult {

    private ?Usuario $user;
    private ?Exception $ex;

    private function __construct()
    {
        
    }

    protected function setUsuario(?Usuario $user)
    {
        $this->user = $user;
    }

    protected function setException(?Exception $ex)
    {
        $this->ex = $ex;
    }

    public static function WithException(?Exception $ex) : GetUserCommandResult  {
        $instance = new self();
        $instance->setException($ex);

        return   $instance;
    }

    public static function WithUsuario(?Usuario $usuario) : GetUserCommandResult {
            $instance = new self();
            $instance->setUsuario($usuario);
            return   $instance;

    }


    public function getUser() {
        return $this->user;
    }

    public function isSuccess() {
        return $this->user != null;
    }

}
