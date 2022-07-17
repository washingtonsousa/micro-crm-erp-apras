import { Component, EventEmitter, Input, OnChanges, OnInit, Output, SimpleChanges } from "@angular/core";
import { PedidoProdutoAdapter } from "src/app/business/adapters/pedido-produto-json.adapter";
import { PedidoProduto } from "src/app/business/entities/model/pedido-produto";



@Component({
  selector: "pedido-produto-tab",
  templateUrl: "pedido-produto-tab.component.html"
})
export class PedidoProdutoTabComponent implements OnInit, OnChanges {


    currentPedidoProdutoDetail!: PedidoProdutoAdapter;
    @Output("onAddFicha") onAddFicha: EventEmitter<any> = new EventEmitter<any>();

    @Output("onAddProduto") onAddProduto: EventEmitter<any> = new EventEmitter<any>();

    ngOnChanges(changes: SimpleChanges): void {
      console.log(changes);

      if(changes.pedidoProdutos)
          this.initList();

    }

    onChooseProduto($event:any) {


      this.pedidoProdutoAdapters.push(new PedidoProdutoAdapter($event));
      this.onAddProduto.emit($event);

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
