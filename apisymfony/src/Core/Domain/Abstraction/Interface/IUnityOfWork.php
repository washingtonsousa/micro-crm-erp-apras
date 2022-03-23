<?php
namespace App\Core\Domain\Abstraction\Interface;


interface IUnityOfWork  {
    
    public function Commit();


}