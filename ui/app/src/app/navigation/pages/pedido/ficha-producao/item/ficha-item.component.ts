import { Component, OnInit } from "@angular/core";
import { Form, FormGroup } from "@angular/forms";
import { ActivatedRoute, Router } from "@angular/router";
import { FichaProducaoAdapter } from "src/app/business/adapters/ficha-producao-json.adapter";
import { FichaProducao } from "src/app/business/entities/model/ficha-producao";
import { DefaultDataResponse } from "src/app/business/entities/response/default-data-response";
import { FichaProducaoEstado } from "src/app/business/enums/ficha-producao-estado.enum";
import { FichaProducaoService } from "src/app/services/core/api/ficha-producao.service";
import { LoadingIconService } from "src/app/services/core/static/loading-icon.service";



@Component({
  selector: "ficha-item",
  templateUrl: "ficha-item.component.html",
  styleUrls: ["ficha-item.scss"]
})
export class FichaItemComponent implements OnInit {

  fichaProducaoAdapter!: FichaProducaoAdapter;
  FichaProducaoEstado = FichaProducaoEstado;




  get fichaProducao () : FichaProducao {
    return this.fichaProducaoAdapter?.fichaProducao;
  }

  goToPrintPage() {
    this.router.navigate(['ficha-print-page'], { state: { fichaData: this.fichaProducaoAdapter }} )
}

  constructor(protected fichaService:FichaProducaoService, private router: Router, private route: ActivatedRoute) {

  }

  load() {
    LoadingIconService.show();

    var idFromParam: any = this.route.snapshot.paramMap.get("id");
    var id = parseInt(idFromParam);

    this.fichaService.GetById(id).subscribe({

      next: (value: DefaultDataResponse<FichaProducao>) => {
        this.fichaProducaoAdapter = new FichaProducaoAdapter(value.data);
        console.log(value.data);
        LoadingIconService.hide();
      },

      error: (error) => {
        LoadingIconService.hide();
      }

    })
  }

  ngOnInit(): void {

    this.load();
  }

  onFichaUpdate(event:any) {
    this.load();
  }

  SalvarCorte() {

  }



}
