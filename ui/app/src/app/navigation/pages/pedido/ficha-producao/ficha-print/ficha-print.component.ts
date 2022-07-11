import { Component, Input, OnInit } from "@angular/core";
import { ActivatedRoute, Router } from "@angular/router";
import { FichaProducaoAdapter } from "src/app/business/adapters/ficha-producao-json.adapter";
import { FichaProducao } from "src/app/business/entities/model/ficha-producao";






@Component({
    selector: "ficha-print",
    templateUrl: "ficha-print.component.html"
})
export class FichaPrintComponent implements OnInit {

   @Input("ficha") fichaProducaoAdapter!: FichaProducaoAdapter | null | undefined;

   

    get fichaProducao () : FichaProducao | undefined | null {
        return this.fichaProducaoAdapter?.fichaProducao;
      }

      constructor() {

      }
    ngOnInit(): void {
     
    }


    

}