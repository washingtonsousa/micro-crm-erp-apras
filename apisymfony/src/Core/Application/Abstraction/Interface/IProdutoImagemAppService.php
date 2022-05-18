<?php
namespace App\Core\Application\Abstraction\Interface;

use App\Core\Application\Abstraction\ViewModel\PaginatedEntityRequestViewModel;
use App\Core\Application\Abstraction\ViewModel\Pagination\PaginationAggregatorViewModel;
use App\Core\Application\ViewModel\ClienteViewModel;
use App\Core\Application\ViewModel\ProdutoImagemViewModel;
use App\Core\Application\ViewModel\ProdutoViewModel;
use Symfony\Component\HttpFoundation\File\UploadedFile;

interface IProdutoImagemAppService {

        public function add(int $id, UploadedFile $file) : ?ProdutoImagemViewModel;
}
