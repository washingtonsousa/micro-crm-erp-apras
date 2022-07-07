import { Component, Input, OnInit, Output,EventEmitter } from "@angular/core";
import { FormBuilder, FormGroup, Validators } from "@angular/forms";
import { FichaProducaoAdapter } from "src/app/business/adapters/ficha-producao-json.adapter";
import { FichaProducao } from "src/app/business/entities/model/ficha-producao";
import { FichaProducaoEstado } from "src/app/business/enums/ficha-producao-estado.enum";
import { FichaProducaoService } from "src/app/services/core/api/ficha-producao.service";
import { LoadingIconService } from "src/app/services/core/static/loading-icon.service";



@Component({
  selector: "ficha-bordado-estamparia",
  templateUrl: "ficha-bordado-estamparia.component.html"
})
export class FichaBordadoEstampariaComponent implements OnInit {

  @Input("fichaProducaoAdapter") fichaProducaoAdapter!: FichaProducaoAdapter;
  FichaProducaoEstado = FichaProducaoEstado;
  @Output("onFichaUpdate") onFichaUpdate: EventEmitter<any> = new EventEmitter<any>();
  get fichaProducao () : FichaProducao {
    return this.fichaProducaoAdapter?.fichaProducao;
  }

  constructor(
    public  formBuilder: FormBuilder, public service:FichaProducaoService)
  {
  }

  Receive() {
    LoadingIconService.show();


    this.service.Update(this.fichaProducaoAdapter.fichaProducao, []).subscribe(
      {

       next: (data) => {
        LoadingIconService.hide();

              console.log(data);

              this.onFichaUpdate.emit();

       }
      }
    );
  }

  Submit() {

      LoadingIconService.show();

      let ficha = this.fichaProducaoAdapter.fichaProducao;

      this.service.Update(this.fichaProducaoAdapter.fichaProducao, []).subscribe(
        {

         next: (data) => {
          LoadingIconService.hide();
          this.onFichaUpdate.emit();

                console.log(data);

         }
        }
      )
  }

  onFillQtn(event:any) {

        let qnt:number = this.fichaProducao.qtnCorteSeparacao - parseInt(event.target.value);

        this.fichaProducaoAdapter.fichaProducao.qtnBordadoEstampaPerda = qnt;
        this.fichaProducaoAdapter.fichaProducao.qtnBordadoEstampa = this.formGroup.value.qtnBordadoEstampa;

        this.formGroup.patchValue({
          qtnBordadoEstampaPerda: qnt
        })

        console.log(qnt);

        console.log( this.fichaProducao);


  }

  ngOnInit(): void {


   this.formGroup = this.formBuilder.group({

      idFichaProducao: [this.fichaProducao.idFichaProducao, [Validators.required]],
      qtnBordadoEstampa: [ undefined , [Validators.required, Validators.max(this.fichaProducao.qtnCorteSeparacao)]  ],
      qtnBordadoEstampaPerda: [ undefined , [Validators.required]]

    });

  }

  formGroup!: FormGroup;
}
