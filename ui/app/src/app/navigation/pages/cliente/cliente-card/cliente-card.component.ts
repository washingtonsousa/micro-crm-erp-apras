import { Component, Input, Output, EventEmitter } from "@angular/core";
import { Cliente } from "src/app/business/entities/model/cliente";
import { Usuario } from "src/app/business/entities/model/usuario";

@Component({
    selector: "cliente-card",
    templateUrl: "cliente-card.component.html"
})
export class ClienteCardComponent {
     @Input("cliente")   cliente!: Cliente;

     @Output("edit") edit: EventEmitter<number> = new EventEmitter<number>();
     @Output("delete") delete: EventEmitter<number> = new EventEmitter<number>();

}
