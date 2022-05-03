<?php
namespace App\Core\Domain\Query;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

class UsuarioQueryHelper {



    public static function buildDefaultPaginatedQueryBuilder(ServiceEntityRepository $repo,$order = 'DESC', $orderField = 'idUsuario') {
          
        //$orderField = empty($orderField) ? 'idUsuario' : $orderField;
        
        return $repo->createQueryBuilder('u')
            ->leftJoin('u.logs','l')
            ->orderBy('u.'.$orderField, $order);
    }

    public static function buildDefaultSelectForGetPageList(\Doctrine\ORM\QueryBuilder $queryBuilder) {
        return $queryBuilder->select('u.idUsuario', 'u.nome', 'u.email', 'u.documento', 'u.dataCriacao');
    }


}