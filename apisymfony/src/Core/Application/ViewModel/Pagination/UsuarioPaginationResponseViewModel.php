<?php
namespace App\Core\Application\ViewModel\Pagination;

use App\Core\Application\Abstraction\ViewModel\Pagination\PaginationAggregatorTemplateViewModel;
use App\Core\Application\ViewModel\UsuarioViewModel;

class UsuarioPaginationResponseViewModel extends PaginationAggregatorTemplateViewModel {

    /**
     * @return UsuarioViewModel[]
     */
    public array $items;

}