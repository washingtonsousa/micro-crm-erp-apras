<?php
namespace App\Core\Domain\Abstraction\Interface;


use App\Core\Domain\Entity\Cliente;
use Symfony\Bridge\Doctrine\Security\User\UserLoaderInterface;
use App\Core\Domain\Abstraction\Interface\IPaginatedRepository;

interface IClienteRepository extends IPaginatedRepository,IGetIdentifiableEntityRepository  {

/**
 * @return Cliente
 */
public function getById($id) : ?Cliente;

/**
 * @return bool
 */
public function checkIfExists(string $strNome, string $codigo);


}
