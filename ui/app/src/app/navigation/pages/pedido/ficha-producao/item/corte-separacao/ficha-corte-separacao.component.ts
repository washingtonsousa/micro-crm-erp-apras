import { Component, Input, OnInit, Output,EventEmitter } from "@angular/core";
import { FormBuilder, FormGroup, Validators } from "@angular/forms";
import { FichaProducaoAdapter } from "src/app/business/adapters/ficha-producao-json.adapter";
import { FichaProducao } from "src/app/business/entities/model/ficha-producao";
import { FichaProducaoEstado } from "src/app/business/enums/ficha-producao-estado.enum";
import { FichaProducaoService } from "src/app/services/core/api/ficha-producao.service";
import { LoadingIconService } from "src/app/services/core/static/loading-icon.service";



@Component({
  selector: "ficha-corte-separacao",
  templateUrl: "ficha-corte-separacao.component.html"
})
export class FichaCorteSeparacaoComponent implements OnInit {

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

        let qnt:number = this.fichaProducao.qtnProducao - parseInt(event.target.value);

        this.fichaProducaoAdapter.fichaProducao.qtnCorteSeparacaoPerda = qnt;
        this.fichaProducaoAdapter.fichaProducao.qtnCorteSeparacao = this.formGroup.value.qtnCorteSeparacao;

        this.formGroup.patchValue({
          qtnCorteSeparacaoPerda: qnt
        })

        console.log(qnt);

        console.log( this.fichaProducao);


  }

  ngOnInit(): void {


   this.formGroup = this.formBuilder.group({

      idFichaProducao: [this.fichaProducao.idFichaProducao, [Validators.required]],
      qtnCorteSeparacao: [ undefined , [Validators.required, Validators.max(200)]  ],
      qtnCorteSeparacaoPerda: [ undefined , [Validators.required]]

    });

  }

  formGroup!: FormGroup;
}
