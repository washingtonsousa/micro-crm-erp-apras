<?php
namespace App\Core\Domain\Repository;

use App\Core\Domain\Abstraction\Interface\IUserRepository;
use App\Core\Domain\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;

class UserRepository implements IUserRepository {

    private ManagerRegistry $doctrine;
    private ObjectManager $manager;
    private $repository;

            public function __construct(ManagerRegistry $doctrine)
            {
                $this->doctrine = $doctrine;
                $this->manager = $this->doctrine->getManager();
                $this->repository = $this->doctrine->getRepository(User::class);
            }


            public function get() : iterable {
                return   $this->repository->findAll();
            }

            public function getById($id) : User {
                return   $this->repository->find($id);
            }

            public function insert(User $user) {

               return $this->manager->persist($user);
            }

}
