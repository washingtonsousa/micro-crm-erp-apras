<?php
namespace App\Core\Domain\Abstraction\Interface;


use App\Core\Domain\Entity\Usuario;
use Symfony\Bridge\Doctrine\Security\User\UserLoaderInterface;
use App\Core\Domain\Abstraction\Interface\IPaginatedRepository;
use App\Core\Domain\Entity\Produto;

interface IProdutoRepository extends IPaginatedRepository, IGetIdentifiableEntityRepository  {

/**
 * @return Produto
 */
public function getById($id) : ?Produto;

// /**
//  * @return bool
//  */
// public function checkIfExists(string $documento, string $email);


}
