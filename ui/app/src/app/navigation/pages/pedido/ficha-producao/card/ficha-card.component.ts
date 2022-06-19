import { Component, Input, Output, EventEmitter } from "@angular/core";
import { FichaProducao } from "src/app/business/entities/model/ficha-producao";
import { Pedido } from "src/app/business/entities/model/pedido";

@Component({
    selector: "ficha-card",
    templateUrl: "ficha-card.component.html"
})
export class FichaProducaoCardComponent {
     @Input("fichaProducao")   ficha!: FichaProducao;

     @Output("edit") edit: EventEmitter<number> = new EventEmitter<number>();
     @Output("delete") delete: EventEmitter<number> = new EventEmitter<number>();

}
