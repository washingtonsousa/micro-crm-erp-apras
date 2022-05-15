<?php
namespace App\Core\Domain\Query;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

class PedidoQueryHelper {



    public static function buildDefaultPaginatedQueryBuilder(ServiceEntityRepository $repo,$order = 'DESC', $orderField = 'idPedido') {
                  
        return $repo->createQueryBuilder('p')
            ->orderBy('p.'.$orderField, $order);
    }

    public static function buildDefaultSelectForGetPageList(\Doctrine\ORM\QueryBuilder $queryBuilder) {
        return $queryBuilder->select('p.idPedido');
    }


}