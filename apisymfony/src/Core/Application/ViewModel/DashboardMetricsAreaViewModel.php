<?php
namespace  App\Core\Application\ViewModel;

use App\Core\Application\Abstraction\ViewModel\EntityViewModel;
use DateTime;

class DashboardMetricsAreaViewModel extends EntityViewModel implements \JsonSerializable {
    
    public int $pedidosCount;
    public int $fichasCount;
    public int $fichasFinalizadasCount;
    public int $pedidosFinalizadosCount;
    
    public function jsonSerialize() {


        return [
            'pedidosCount' => $this->pedidosCount,
            'fichasCount' => $this->fichasCount,
            'fichasFinalizadasCount' => $this->fichasFinalizadasCount,
            'pedidosFinalizadosCount' => $this->pedidosFinalizadosCount
        ];
    }
}
