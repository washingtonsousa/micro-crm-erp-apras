import { Component, OnInit, ViewChild } from "@angular/core";
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
import { UpdateCreateReactiveForm } from "../../forms/abstractions/update-create-reactive-form";
import { ProdutoShowcaseComponent } from "../../produto/produto-showcase/produto-showcase.component";


@Component({
  selector: "pedido-form",
  templateUrl: "pedido-form.component.html"
})
export class PedidoFormComponent extends UpdateCreateReactiveForm<Pedido>  implements OnInit {


       pedidoFormGroup!:   FormGroup;
       clientes: Cliente[] = [];
        choosedCliente!: Cliente | undefined;
        clienteSelectBox : SelectBoxItem[] = [];
      @ViewChild('produtoShowCase') produtoShowCase!: ProdutoShowcaseComponent;
       constructor(public clienteService:ClienteService,
        public override formBuilder: FormBuilder,
        public override dataService: PedidoService)
      {
        super();
      }

      removeProduto(index:any) {

        const indexOf = this.entity.pedidoProdutos.indexOf(index);
        if (index > -1) {
          this.entity.pedidoProdutos.splice(indexOf, 1); // 2nd parameter means remove one item only
        }
        this.formGroup.patchValue({
          pedidoProdutos: this.entity.pedidoProdutos
        });

      }

      onChooseProduto($event:any) {

        this.entity.pedidoProdutos.push($event);

        console.log($event);

        this.formGroup.patchValue({
          pedidoProdutos: this.entity.pedidoProdutos
        });

      }

      onChooseCliente(idCliente: any) {


          let currentCliente = this.choosedCliente;

          this.choosedCliente = this.clientes.find((cliente) => {

              return idCliente == cliente.idCliente;

          })

          if(this.choosedCliente != undefined
            &&

            this.choosedCliente.codigoCliente !=
            currentCliente?.codigoCliente

            && !this.choosedCliente.isLoja

            )
            {
            this.produtoShowCase.onFilterCliente(this.choosedCliente.codigoCliente);
            this.entity.pedidoProdutos = [];
            this.formGroup.patchValue({
              pedidoProdutos: []
            });

            }


          if(this.choosedCliente?.isLoja)
          this.produtoShowCase.onFilterCliente('');

      }

      override ngOnInit(): void {

                super.ngOnInit();

                if(this.entity == undefined)
                  this.entity = new Pedido();

                LoadingIconService.show('inicializando Componentes...');

                this.clienteService.Get(new PaginationDataRequest(1,100)).subscribe({

                      next: (data: DefaultDataResponse<PaginationReponse<Cliente>>) => {

                          this.clientes =  data.data.items;

                          for(let cliente of this.clientes){
                            this.clienteSelectBox.push({ key: cliente.strNome , value: cliente.idCliente });
                          }

                      }

                });

      }

      Submit() {

        super.OnSubmit([]);

      }


      initForm(): void {

     //   console.log(this.entity);
       this.formGroup = this.formBuilder.group({
            idCliente: [this.entity?.idCliente, [Validators.required]],
            txtObservacoes: [this.entity?.txtObservacoes],
            pedidoProdutos: [this.entity?.pedidoProdutos]
       });

      }


}
