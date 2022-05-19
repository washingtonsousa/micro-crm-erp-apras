import { Component, Input, Output, EventEmitter } from "@angular/core";
import { Pedido } from "src/app/business/entities/model/pedido";

@Component({
    selector: "pedido-card",
    templateUrl: "pedido-card.component.html"
})
export class PedidoCardComponent {
     @Input("pedido")   pedido!: Pedido;

     @Output("edit") edit: EventEmitter<number> = new EventEmitter<number>();
     @Output("delete") delete: EventEmitter<number> = new EventEmitter<number>();

}
