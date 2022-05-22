import { Component, OnInit } from "@angular/core";
import { FormBuilder, FormGroup, Validators } from "@angular/forms";
import { Cliente } from "src/app/business/entities/model/cliente";
import { Pedido } from "src/app/business/entities/model/pedido";
import { PaginationDataRequest } from "src/app/business/entities/request/pagination-data-request";
import { DefaultDataResponse } from "src/app/business/entities/response/default-data-response";
import { PaginationReponse } from "src/app/business/entities/response/pagination-response";
import { ClienteService } from "src/app/services/core/api/cliente-service.service";
import { PedidoService } from "src/app/services/core/api/pedido-service.service";
import { LoadingIconService } from "src/app/services/core/static/loading-icon.service";
import { SelectBoxItem } from "src/app/ui-components/material/forms/select-box/select-box-item.model";
import { UpdateCreateReactiveForm } from "../abstractions/update-create-reactive-form";


@Component({
  selector: "pedido-form",
  templateUrl: "pedido-form.component.html"
})
export class PedidoFormComponent extends UpdateCreateReactiveForm<Pedido>  implements OnInit {


       pedidoFormGroup!:   FormGroup;
       clientes: Cliente[] = [];

        clienteSelectBox : SelectBoxItem[] = [];

       constructor(public clienteService:ClienteService, public override formBuilder: FormBuilder,
        public override dataService: PedidoService)
      {
        super();
      }

      override ngOnInit(): void {
                super.ngOnInit();

                LoadingIconService.show('inicializando Componentes...');

                this.clienteService.Get(new PaginationDataRequest(1,100)).subscribe({

                      next: (data: DefaultDataResponse<PaginationReponse<Cliente>>) => {

                          this.clientes =  data.data.items;

                          for(let cliente of this.clientes){
                            this.clienteSelectBox.push({ key: cliente.strNome , value: cliente.idCliente.toString() });
                          }

                      }

                });

      }

      Submit() {



      }


      initForm(): void {
       this.formGroup = this.formBuilder.group({
            idCliente: [this.entity?.idCliente, [Validators.required]],
            txtObservacoes: [this.entity?.txtObservacoes, [Validators.required]],
            pedidoProdutos: [this.entity?.pedidoProdutos, [Validators.required]]
       });
      }


}
