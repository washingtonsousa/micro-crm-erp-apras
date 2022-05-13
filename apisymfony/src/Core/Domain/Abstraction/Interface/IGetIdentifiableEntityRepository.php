<?php
namespace App\Core\Domain\Abstraction\Interface;


use App\Core\Domain\Entity\Cliente;
use Symfony\Bridge\Doctrine\Security\User\UserLoaderInterface;
use App\Core\Domain\Abstraction\Interface\IPaginatedRepository;

interface IGetIdentifiableEntityRepository  {

/**
 * @return mixed
 */
public function getById($id) : mixed;



}
