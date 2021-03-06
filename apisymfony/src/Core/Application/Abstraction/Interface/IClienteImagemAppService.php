<?php
namespace App\Core\Application\Abstraction\Interface;

use App\Core\Application\ViewModel\ClienteImagemViewModel;
use Symfony\Component\HttpFoundation\File\UploadedFile;

interface IClienteImagemAppService {
        public function addOrUpdate(int $id, UploadedFile $file) : ?ClienteImagemViewModel;
}
