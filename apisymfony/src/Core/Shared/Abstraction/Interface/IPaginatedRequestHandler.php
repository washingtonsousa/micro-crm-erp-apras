<?php
namespace App\Core\Shared\Abstraction\Interface;

use App\Core\Application\Abstraction\ViewModel\PaginatedEntityRequestViewModel;

interface  IPaginatedRequestHandler extends IHandler {
    public function getRequestViewModel() : PaginatedEntityRequestViewModel;
}