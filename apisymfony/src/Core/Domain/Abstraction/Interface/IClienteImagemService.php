<?php
namespace App\Core\Domain\Abstraction\Interface;

use App\Core\Domain\Entity\ClienteImagem;
use App\Core\Domain\Entity\Imagem;
use Symfony\Component\HttpFoundation\File\UploadedFile;

interface IClienteImagemService {

            public function  update(ClienteImagem $imagem, UploadedFile $file);
            public function add(ClienteImagem $imagem, UploadedFile $file) : ?ClienteImagem;
            public function getById(int $id) : ?Imagem;
            public function remove($id) : bool;
}