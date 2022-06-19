import { Component, Input, OnChanges, OnInit, SimpleChanges } from "@angular/core";
import { PedidoProdutoAdapter } from "src/app/business/adapters/pedido-produto-json.adapter";
import { PedidoProduto } from "src/app/business/entities/model/pedido-produto";



@Component({
  selector: "pedido-produto-tab",
  templateUrl: "pedido-produto-tab.component.html"
})
export class PedidoProdutoTabComponent implements OnInit, OnChanges {


    currentPedidoProdutoDetail!: PedidoProdutoAdapter;

    ngOnChanges(changes: SimpleChanges): void {
      console.log(changes);

      if(changes.pedidoProdutos)
          this.initList();

    }


    ngOnInit(): void {

    }

    initList() {

      this.pedidoProdutoAdapters = [];

      for(let pedidoProduto of this.pedidoProdutos ? this.pedidoProdutos : [])
      this.pedidoProdutoAdapters.push(new PedidoProdutoAdapter(pedidoProduto));


    }

    @Input("pedidoProdutos") pedidoProdutos: PedidoProduto[] | undefined = [];
    pedidoProdutoAdapters: PedidoProdutoAdapter[] = [];

}
