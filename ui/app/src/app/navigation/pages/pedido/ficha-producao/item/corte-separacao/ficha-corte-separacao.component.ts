import { Component, Input, OnInit } from "@angular/core";
import { FormBuilder, FormGroup, Validators } from "@angular/forms";
import { FichaProducaoAdapter } from "src/app/business/adapters/ficha-producao-json.adapter";
import { FichaProducao } from "src/app/business/entities/model/ficha-producao";
import { FichaProducaoEstado } from "src/app/business/enums/ficha-producao-estado.enum";



@Component({
  selector: "ficha-corte-separacao",
  templateUrl: "ficha-corte-separacao.component.html"
})
export class FichaCorteSeparacaoComponent implements OnInit {

  @Input("fichaProducaoAdapter") fichaProducaoAdapter!: FichaProducaoAdapter;
  FichaProducaoEstado = FichaProducaoEstado;

  get fichaProducao () : FichaProducao {
    return this.fichaProducaoAdapter?.fichaProducao;
  }

  constructor(
    public  formBuilder: FormBuilder)
  {
  }

  Receive() {

  }

  Submit() {

  }

  onFillQtn(event:any) {

        let qnt:number = this.fichaProducao.qtnProducao - parseInt(event.target.value);

        this.fichaProducaoAdapter.fichaProducao.qtnCorteSeparacaoPerda = qnt;

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
