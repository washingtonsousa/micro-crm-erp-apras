import { Component, Input, Output, EventEmitter } from "@angular/core";
import { Produto } from "src/app/business/entities/model/produto";

@Component({
    selector: "produto-card",
    templateUrl: "produto-card.component.html"
})
export class ProdutoCardComponent {
     @Input("produto")   produto!: Produto;

     @Output("edit") edit: EventEmitter<number> = new EventEmitter<number>();
     @Output("delete") delete: EventEmitter<number> = new EventEmitter<number>();

}
