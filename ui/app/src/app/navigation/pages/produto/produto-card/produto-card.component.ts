import { Component, Input, Output, EventEmitter, OnChanges, SimpleChanges, ViewChild } from "@angular/core";
import { Produto } from "src/app/business/entities/model/produto";
import { CardWithIconComponent } from "src/app/ui-components/material/card/card-with-icon/card-with-icon.component";

@Component({
    selector: "produto-card",
    templateUrl: "produto-card.component.html"
})
export class ProdutoCardComponent   {

     @Input("produto") public  produto!: Produto;
     @Input("editMode")   editMode: boolean = true;
     @ViewChild("cardAutoRef") public cardAutoRef!: CardWithIconComponent;
     @Output("edit") edit: EventEmitter<number> = new EventEmitter<number>();
     @Output("delete") delete: EventEmitter<number> = new EventEmitter<number>();
     @Output("onCheck") onCheck: EventEmitter<Produto> = new EventEmitter<Produto>();

     public checkCard(emit:boolean = false) {
      this.cardAutoRef.checked = this.cardAutoRef.checked ? false : true;

      if(emit)
      this.onCheck.emit(this.produto);
     }

}
