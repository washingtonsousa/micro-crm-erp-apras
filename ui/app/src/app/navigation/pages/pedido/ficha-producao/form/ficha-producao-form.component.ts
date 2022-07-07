import { Component, EventEmitter, Input, OnInit, Output } from "@angular/core";
import { FormBuilder, FormGroup, Validators } from "@angular/forms";
import { FichaProducao } from "src/app/business/entities/model/ficha-producao";
import { PedidoProduto } from "src/app/business/entities/model/pedido-produto";
import { DefaultDataResponse } from "src/app/business/entities/response/default-data-response";
import { FichaProducaoService } from "src/app/services/core/api/ficha-producao.service";
import { LoadingIconService } from "src/app/services/core/static/loading-icon.service";




@Component({
    selector: "ficha-producao-form",
    templateUrl: "ficha-producao-form.component.html"
})
export class FichaProducaoFormComponent implements OnInit {

  formGroup!: FormGroup;
  @Input("pedidoProduto") pedidoProduto!: PedidoProduto;
  @Output("onSubmitSuccess") onSubmitSuccess: EventEmitter<any> = new EventEmitter<any>();
  constructor(
    public  formBuilder: FormBuilder,
    public  dataService: FichaProducaoService)
  {
  }

  get maxQuantidade() {
    let maxQuantidade = this.pedidoProduto.quantidade > 200 ? 200 : this.pedidoProduto.quantidade;

    return maxQuantidade;

  }

  Submit() {
      console.log("fichaSendoCriada");
      console.log(this.formGroup.value);

      LoadingIconService.show();

      this.dataService.Subscribe(this.formGroup.value).subscribe({

          next: (value: DefaultDataResponse<FichaProducao>) => {
              console.log(value);
              LoadingIconService.hide();
              this.onSubmitSuccess.emit();
          }


      });

  }


  setPedidoProduto(pedidoProduto: any) {
    this.pedidoProduto = pedidoProduto;

    this.init();
  }

  init() {

    let maxQuantidade = this.pedidoProduto.quantidade > 200 ? 200 : this.pedidoProduto.quantidade;

    console.log(maxQuantidade);

    this.formGroup = this.formBuilder.group({
      idPedidoProduto: [this.pedidoProduto.idPedidoProduto,[Validators.required]],

        qtnProducao: [ 1, [
          Validators.required,
          Validators.min(1),
          Validators.max(maxQuantidade)
          ]
        ]

    });
  }

  ngOnInit(): void {

    if(this.pedidoProduto != undefined)
     this.init();
  }



}
