<?php
namespace App\Core\Domain\Query;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

class ClienteQueryHelper {



    public static function buildDefaultPaginatedQueryBuilder(ServiceEntityRepository $repo,$order = 'DESC', $orderField = 'idCliente') {
                  
        return $repo->createQueryBuilder('c')
            ->leftJoin('c.clienteImagens', 'i')
            ->leftJoin('i.imagem', 'img')
            ->orderBy('c.'.$orderField, $order);
    }

    public static function buildDefaultSelectForGetPageList(\Doctrine\ORM\QueryBuilder $queryBuilder) {
        return $queryBuilder->select('c', 'i', 'img');
    }


}