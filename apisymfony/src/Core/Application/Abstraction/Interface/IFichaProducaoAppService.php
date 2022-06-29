<?php
namespace App\Core\Application\Abstraction\Interface;

use App\Core\Application\Abstraction\ViewModel\PaginatedEntityRequestViewModel;
use App\Core\Application\Abstraction\ViewModel\Pagination\PaginationAggregatorViewModel;
use App\Core\Application\ViewModel\FichaProducaoViewModel;

interface IFichaProducaoAppService {

        public function getById(int $id) : ?FichaProducaoViewModel;
        public function update(FichaProducaoViewModel $cliente, $id) : ?FichaProducaoViewModel;
        public function patch(FichaProducaoViewModel $ficha, $id) : ?FichaProducaoViewModel;

        public function subscribe(FichaProducaoViewModel $fichaViewModel) : ?FichaProducaoViewModel;
        public function get(PaginatedEntityRequestViewModel $paramsModel) : ?PaginationAggregatorViewModel;
        public function remove($id) : bool;

}
