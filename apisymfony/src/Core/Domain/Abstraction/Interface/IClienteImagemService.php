<?php
namespace App\Core\Domain\Abstraction\Interface;

use App\Core\Domain\Entity\ClienteImagem;
use App\Core\Domain\Entity\Imagem;
use Symfony\Component\HttpFoundation\File\UploadedFile;

interface IClienteImagemService {

            public function addOrUpdate(ClienteImagem $imagem, UploadedFile $file) : ?ClienteImagem;
            public function getByClienteId(int $id) : ?ClienteImagem;
      

}