import { Component, Input, Output, EventEmitter } from "@angular/core";
import { Usuario } from "src/app/business/entities/model/usuario";

@Component({
    selector: "usuario-card",
    templateUrl: "usuario-card.component.html"
})
export class UsuarioCardComponent {
     @Input("usuario")   usuario!:Usuario;

     @Output("edit") edit: EventEmitter<number> = new EventEmitter<number>();
     @Output("delete") delete: EventEmitter<number> = new EventEmitter<number>();

}
