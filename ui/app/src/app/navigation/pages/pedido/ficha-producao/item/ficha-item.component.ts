import { Component, OnInit } from "@angular/core";
import { ActivatedRoute } from "@angular/router";
import { FichaProducaoAdapter } from "src/app/business/adapters/ficha-producao-json.adapter";
import { FichaProducao } from "src/app/business/entities/model/ficha-producao";
import { DefaultDataResponse } from "src/app/business/entities/response/default-data-response";
import { FichaProducaoService } from "src/app/services/core/api/ficha-producao.service";



@Component({
  selector: "ficha-item",
  templateUrl: "ficha-item.component.html"
})
export class FichaItemComponent implements OnInit {

  fichaProducaoAdapter!: FichaProducaoAdapter;

  get fichaProducao() {
    return this.fichaProducaoAdapter?.fichaProducao;
  }

  constructor(protected fichaService:FichaProducaoService, private route: ActivatedRoute) {

  }

  ngOnInit(): void {

    var idFromParam: any = this.route.snapshot.paramMap.get("id");
    var id = parseInt(idFromParam);

    this.fichaService.GetById(id).subscribe({

      next: (value: DefaultDataResponse<FichaProducao>) => {
        this.fichaProducaoAdapter = new FichaProducaoAdapter(value.data);
      }

    })
  }



}
