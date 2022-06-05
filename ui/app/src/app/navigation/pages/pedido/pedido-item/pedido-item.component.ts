import { Component, OnInit } from "@angular/core";
import { ActivatedRoute } from "@angular/router";
import { Pedido } from "src/app/business/entities/model/pedido";
import { DefaultDataResponse } from "src/app/business/entities/response/default-data-response";
import { PedidoService } from "src/app/services/core/api/pedido-service.service";


@Component({

    selector: "pedido-item",
    templateUrl: "pedido-item.component.html"


})
export class PedidoItemComponent implements OnInit {

            pedido!:Pedido;

            constructor(private pedidoService:PedidoService, private route: ActivatedRoute) {

            }



            ngOnInit(): void {

                var idFromParam: any = this.route.snapshot.paramMap.get("id");
                var id = parseInt(idFromParam);

                this.pedidoService.GetById(id).subscribe({

                  next: (value:DefaultDataResponse<Pedido>) => {
                    console.log(value);

                    this.pedido = value.data;

                  }

                });

            }




}
