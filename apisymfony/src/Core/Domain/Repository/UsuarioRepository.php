<?php
namespace App\Core\Domain\Repository;

use App\Core\Domain\Abstraction\Interface\IUsuarioRepository;
use App\Core\Domain\Entity\NonDatabaseEntity\PaginationAggregator;
use App\Core\Domain\Entity\Usuario;
use App\Core\Domain\Helper\Doctrine\PaginationHelper;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
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

            public function get($filters, $pageSize = 0, $page = 0) : PaginationAggregator {  

                $query =   $this->createQueryBuilder('u')
                ->leftJoin('u.logs','l');

                foreach ($filters as $key => $value) {
                    $query->where('u.'.$key.' '.$value['operator'].' :'.$key); 
                } 
                
                foreach ($filters as $key => $value) {
                    $query->setParameter('u.'.$key, $value['value']); 
                }  

                $query = $query->getQuery();

                return PaginationHelper::executePaginationAggregator($query,$pageSize,$page);

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

                return  $this->createQueryBuilder('u')
                ->select('COUNT(u.idUsuario)')
                ->where('u.documento = :documento OR u.email = :email')
                ->setParameter('documento', $documento)
                ->setParameter('email', $email)
                ->getQuery()
                ->getScalarResult(\Doctrine\ORM\Query::HYDRATE_SINGLE_SCALAR) > 0;

            }

}
