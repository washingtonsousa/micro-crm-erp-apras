import { Component, Input, OnChanges, OnInit, SimpleChanges } from "@angular/core";
import { PedidoProdutoAdapter } from "src/app/business/adapters/pedido-produto-json.adapter";
import { PedidoProduto } from "src/app/business/entities/model/pedido-produto";



@Component({
  selector: "fichas-pedido-produto-table",
  templateUrl: "fichas-pedido-produto-table.component.html"
})
export class FichasPedidoProdutoTableComponent implements OnInit {

  get pedidoProduto() {
    return this.pedidoProdutoAdapter?.pedidoProduto;
  }

   @Input("pedidoProdutoAdapter") pedidoProdutoAdapter!: PedidoProdutoAdapter;


    ngOnInit(): void {

    }



}
