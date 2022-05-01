<?php
namespace App\Core\Domain\Repository;

use App\Core\Domain\Abstraction\Interface\IUsuarioRepository;
use App\Core\Domain\Entity\NonDatabaseEntity\PaginationAggregator;
use App\Core\Domain\Entity\NonDatabaseEntity\QueryExpression;
use App\Core\Domain\Entity\Usuario;
use App\Core\Domain\Helper\Doctrine\PaginationHelper;
use App\Core\Domain\Helper\QueryHelper;
use App\Core\Domain\Query\UsuarioQueryHelper;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\AbstractQuery;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\User\UserInterface;

class UsuarioRepository  extends ServiceEntityRepository implements IUsuarioRepository {

    private ManagerRegistry $doctrine;
    private ObjectManager $manager;

            public function __construct(ManagerRegistry $doctrine)
            {
                $this->doctrine = $doctrine;
                $this->manager = $this->doctrine->getManager();
                parent::__construct($doctrine, Usuario::class);
            }

            public function get(QueryExpression $queryExpression, $pageSize = 0, $orderBy, $page = 0, $order = 'DESC', ) : PaginationAggregator {  

                $query = UsuarioQueryHelper::buildDefaultPaginatedQueryBuilder($this,$order, $orderBy);
                $queryForCount  = UsuarioQueryHelper::buildDefaultPaginatedQueryBuilder($this,$order, $orderBy);
                
                $query = UsuarioQueryHelper::buildDefaultSelectForGetPageList($query);
                $totalItemsCount = (int) QueryHelper::buildQueryFiltersAndDoCount($queryForCount, $queryExpression, 'u.idUsuario');

                $query = QueryHelper::buildQueryFilters($query, $queryExpression);

                return PaginationHelper::executePaginationAggregator($query->getQuery(), $pageSize,$page, $totalItemsCount);

            }

            public function getById($id) : Usuario {

                return  $this->createQueryBuilder('u')
                ->select('u')
                ->where('u.id_usuario = :id_usuario')
                ->setParameter('id_usuario', $id) 
                ->getQuery()   
                ->getOneOrNullResult();

            }

            public function loadUserByIdentifier(string $identifier): ?UserInterface
            {
             

                 return  $this->createQueryBuilder('u')
                 ->select('u')
                 ->where('u.status = :status AND (u.documento = :documento OR u.email = :email)')
                 ->setParameter('status', true)
                 ->setParameter('documento', $identifier)
                 ->setParameter('email', $identifier)
                 ->getQuery()
                 ->getOneOrNullResult();



            }

            public function insert(Usuario $user) {

               return $this->manager->persist($user);
            }

            public function checkIfExists(string $documento, string $email) {

                $result = (int) $this->createQueryBuilder('u')
                ->select('COUNT(u.idUsuario)')
                ->where('u.documento = :documento OR u.email = :email')
                ->setParameter('documento', $documento)
                ->setParameter('email', $email)
                ->getQuery()
                ->getSingleScalarResult();

                return      $result  > 0;
            }

}
