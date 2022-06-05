import { Component, OnInit } from "@angular/core";
import { ActivatedRoute } from "@angular/router";
import { Pedido } from "src/app/business/entities/model/pedido";
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

                var id = parseInt(this.route.snapshot.paramMap.get("id"));

                this.pedidoService.GetById(id).subscribe({


                });
               
            }




}