import { ChangeDetectorRef, Component, OnInit, ViewChild } from "@angular/core";
import { ActivatedRoute } from "@angular/router";
import { TabsetComponent } from "ngx-bootstrap/tabs";
import { Pedido } from "src/app/business/entities/model/pedido";
import { DefaultDataResponse } from "src/app/business/entities/response/default-data-response";
import { PedidoService } from "src/app/services/core/api/pedido-service.service";
import { LoadingIconService } from "src/app/services/core/static/loading-icon.service";
import { ProdutoShowcaseComponent } from "../../produto/produto-showcase/produto-showcase.component";
import { PedidoProdutoTabComponent } from "./tabs/pedido-produto-tab.component";


@Component({

    selector: "pedido-item",
    templateUrl: "pedido-item.component.html"


})
export class PedidoItemComponent implements OnInit {

            pedido!:Pedido;
            @ViewChild('produtoShowCase') produtoShowCase!: ProdutoShowcaseComponent;
            @ViewChild('pedidoProdutoTab') pedidoProdutoTab!: PedidoProdutoTabComponent;

            constructor(private pedidoService:PedidoService, private cref: ChangeDetectorRef, private route: ActivatedRoute) {

            }

            @ViewChild('staticTabs', { static: false }) staticTabs?: TabsetComponent;

      selectTab(tabId: number) {
        if (this.staticTabs?.tabs[tabId]) {
          this.staticTabs.tabs[tabId].active = true;
        }
      }



    onChooseProduto($event:any) {

      this.pedido.pedidoProdutos.push($event);
      this.cref.detectChanges();
      console.log(this.pedido.pedidoProdutos);
      this.pedidoProdutoTab.initList();

    }

      updatePedido() {


        LoadingIconService.show();

        this.pedidoService.Patch(this.pedido).subscribe({

          next: (data) => {

            console.log(data);
            LoadingIconService.hide();
            this.pedido = data.data;
            this.cref.detectChanges();
            console.log(this.pedido.pedidoProdutos);
            this.pedidoProdutoTab.initList();

          },

          error: (err) => {


            console.log(err);
            LoadingIconService.hide();

          }


        });

      }

      load() {
        LoadingIconService.show("Aguarde...");

        var idFromParam: any = this.route.snapshot.paramMap.get("id");
        var id = parseInt(idFromParam);

        this.pedidoService.GetById(id).subscribe({

          next: (value:DefaultDataResponse<Pedido>) => {
            console.log(value);
            LoadingIconService.hide();

            this.pedido = value.data;

            this.produtoShowCase.onFilterCliente(value.data.cliente.codigoCliente);

            console.log("onLoadPedido");
          },

          error: (err) => {  LoadingIconService.hide(); console.log(err); }

        });
      }
            ngOnInit(): void {

              this.load();

            }




}
