<?php
namespace App\Core\Domain\Query;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

class FichaProducaoQueryHelper {

    public static function buildDefaultPaginatedQueryBuilder(ServiceEntityRepository $repo,$order = 'DESC', $orderField = 'idFichaProducao') {
                  
        return $repo->createQueryBuilder('f')
        ->leftJoin('f.pedidoProduto', 'pP')
        ->leftJoin('pP.produto', 'prd')
        ->leftJoin('pP.pedido', 'p')
        ->leftJoin('p.cliente', 'c')
        ->orderBy('f.'.$orderField, $order);
        
    }

    public static function buildDefaultSelectForGetPageList(\Doctrine\ORM\QueryBuilder $queryBuilder) {
        return $queryBuilder->select('f', 'p', 'c', 'pP', 'prd');
    }

}