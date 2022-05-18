<?php
namespace App\Core\Domain\Abstraction\Interface;

use App\Core\Domain\Entity\ClienteImagem;
use App\Core\Domain\Entity\Imagem;
use App\Core\Domain\Entity\ProdutoImagem;
use Symfony\Component\HttpFoundation\File\UploadedFile;

interface IProdutoImagemService {

            public function add(ProdutoImagem $imagem, UploadedFile $file) : ?ProdutoImagem;
       
}