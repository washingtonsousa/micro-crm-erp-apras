import { ChangeDetectorRef, Component } from "@angular/core";
import { Router } from "@angular/router";
import { FichaProducao } from "src/app/business/entities/model/ficha-producao";
import { FichaProducaoDataRequest } from "src/app/business/entities/request/ficha-producao-pagination-data-request";
import { FichaProducaoEstado } from "src/app/business/enums/ficha-producao-estado.enum";
import { estadoFichaSelectItems } from "src/app/business/helpers/data/estado-ficha-data-helper";
import { CrudPageTemplate } from "src/app/navigation/abstractions/template/crud-page-template";
import { FichaProducaoService } from "src/app/services/core/api/ficha-producao.service";
import { SelectBoxItem } from "src/app/ui-components/material/forms/select-box/select-box-item.model";




@Component({
    selector: "ficha-producao",
    templateUrl: "ficha-producao.component.html"
})
export class FichaProducaoComponent extends CrudPageTemplate<FichaProducao> {
  public override request: FichaProducaoDataRequest = new FichaProducaoDataRequest();
  public estadoFichaSelectBox: SelectBoxItem[] = estadoFichaSelectItems;

  constructor(public override dataService:  FichaProducaoService,
    public override changeDetector: ChangeDetectorRef, public router:Router){

      super();

  }



  onFilterEstadoFicha(estadoFicha:FichaProducaoEstado) {
    this.request.estadoFicha = estadoFicha;
    this.request.page = 1;
    this.loadPageData();
  }


}
