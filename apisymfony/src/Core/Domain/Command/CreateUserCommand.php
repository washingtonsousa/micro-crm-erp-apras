<?php
namespace App\Core\Domain\Command;

use App\Core\Domain\Abstraction\Command\Command;
use App\Core\Domain\Abstraction\Interface\IUserRepository;
use App\Core\Domain\Command\Result\CreateUserCommandResult;
use App\Core\Domain\Entity\User;
use App\Core\Domain\Entity\UserEntity;
use Exception;
use Illuminate\Container\Container;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Facades\App;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;

class CreateUserCommand extends Command {


    private User $_user;
    private IUserRepository $_userRepo;

    public function __construct(User $user, IUserRepository $userRepo)
    {
            $this->_user = $user;
            $this->_userRepo = $userRepo;
    }

    public function GenerateResult() {


        try {
            $result = $this->_userRepo->insert($this->_user);
            $this->setResult(new CreateUserCommandResult($result));

        } catch(Exception $ex) {
            $this->setResult(new CreateUserCommandResult(null));
        }
    }

    public function ValidateResult() {
            //TODO
            return null;
    }

}
