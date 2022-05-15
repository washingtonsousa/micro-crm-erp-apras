<?php
namespace App\Core\Domain\Abstraction\Interface;


use App\Core\Domain\Entity\Usuario;
use Symfony\Bridge\Doctrine\Security\User\UserLoaderInterface;
use App\Core\Domain\Abstraction\Interface\IPaginatedRepository;
use App\Core\Domain\Entity\Imagem;
use App\Core\Domain\Entity\Produto;

interface IImagemRepository extends  IGetIdentifiableEntityRepository  {

/**
 * @return Imagem
 */
public function getById($id) : ?Imagem;

// /**
//  * @return bool
//  */
// public function checkIfExists(string $documento, string $email);


}
