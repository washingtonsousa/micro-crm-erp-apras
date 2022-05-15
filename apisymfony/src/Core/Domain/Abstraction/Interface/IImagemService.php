<?php
namespace App\Core\Domain\Abstraction\Interface;

use App\Core\Domain\Entity\Imagem;

interface IImagemService {

            public function update(Imagem $imagem, $id);
            public function subscribe(Imagem $user);
            public function getById(int $id) : ?Imagem;
            public function remove($id) : bool;
}