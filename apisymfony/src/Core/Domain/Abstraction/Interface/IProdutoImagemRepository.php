<?php
namespace App\Core\Domain\Abstraction\Interface;


use App\Core\Domain\Entity\Cliente;
use Symfony\Bridge\Doctrine\Security\User\UserLoaderInterface;
use App\Core\Domain\Abstraction\Interface\IPaginatedRepository;
use App\Core\Domain\Entity\ClienteImagem;
use App\Core\Domain\Entity\Imagem;
use App\Core\Domain\Entity\ProdutoImagem;

interface IProdutoImagemRepository extends IGetIdentifiableEntityRepository  {

/**
 * @return Imagem
 */
public function getById($id) : ?ProdutoImagem;



}
