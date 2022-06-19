import { ChangeDetectorRef, Component } from "@angular/core";
import { Router } from "@angular/router";
import { FichaProducao } from "src/app/business/entities/model/ficha-producao";
import { CrudPageTemplate } from "src/app/navigation/abstractions/template/crud-page-template";
import { FichaProducaoService } from "src/app/services/core/api/ficha-producao.service";




@Component({
    selector: "ficha-producao",
    templateUrl: "ficha-producao.component.html"
})
export class FichaProducaoComponent extends CrudPageTemplate<FichaProducao> {

  constructor(public override dataService:  FichaProducaoService,
    public override changeDetector: ChangeDetectorRef, public router:Router){

      super();

  }





}
