import { Component, OnInit, ViewChild } from "@angular/core";
import { ActivatedRoute } from "@angular/router";
import { TabsetComponent } from "ngx-bootstrap/tabs";
import { Pedido } from "src/app/business/entities/model/pedido";
import { DefaultDataResponse } from "src/app/business/entities/response/default-data-response";
import { PedidoService } from "src/app/services/core/api/pedido-service.service";
import { LoadingIconService } from "src/app/services/core/static/loading-icon.service";


@Component({

    selector: "pedido-item",
    templateUrl: "pedido-item.component.html"


})
export class PedidoItemComponent implements OnInit {

            pedido!:Pedido;

            constructor(private pedidoService:PedidoService, private route: ActivatedRoute) {

            }

            @ViewChild('staticTabs', { static: false }) staticTabs?: TabsetComponent;

      selectTab(tabId: number) {
        if (this.staticTabs?.tabs[tabId]) {
          this.staticTabs.tabs[tabId].active = true;
        }
      }



            ngOnInit(): void {

              LoadingIconService.show("Aguarde...");

                var idFromParam: any = this.route.snapshot.paramMap.get("id");
                var id = parseInt(idFromParam);

                this.pedidoService.GetById(id).subscribe({

                  next: (value:DefaultDataResponse<Pedido>) => {
                    console.log(value);
                    LoadingIconService.hide();

                    this.pedido = value.data;

                  },

                  error: (err) => {  LoadingIconService.hide(); console.log(err); }

                });

            }




}
