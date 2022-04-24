<?php
namespace App\Core\Domain\Repository;

use App\Core\Domain\Abstraction\Interface\IUsuarioRepository;
use App\Core\Domain\Entity\User;
use App\Core\Domain\Entity\Usuario;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bridge\Doctrine\Security\User\UserLoaderInterface;
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


            public function get() : iterable {
                return   $this->findAll();
            }

            public function getById($id) : Usuario {
                return   $this->find($id);
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

}
