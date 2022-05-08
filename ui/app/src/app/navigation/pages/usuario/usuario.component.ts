import { Component, OnInit } from "@angular/core";
import { Usuario } from "src/app/business/entities/model/usuario";
import { DefaultDataResponse } from "src/app/business/entities/response/default-data-response";
import { PaginationReponse } from "src/app/business/entities/response/pagination-response";
import { UsuarioService } from "src/app/services/core/api/usuario-service.service";
import { GlobalModalService } from "src/app/services/core/static/global-modal.service";
import { GlobalModalConfig } from "src/app/ui-components/material/modal/global-modal/global-modal";



@Component({
  selector: "usuario",
  templateUrl: "usuario.component.html"
})
export class UsuarioComponent implements OnInit {

     pageData!: PaginationReponse<Usuario>;
     notifications: any[] = [];

      constructor(private usuarioService:  UsuarioService){

      }

      onSubscribeFail($event:any) {
            this.notifications = $event?.data;

      }

      onSubscribeSuccess($event:any) {
        this.notifications = [];
        GlobalModalService.open("Usuário cadastrado com sucesso");
        this.ngOnInit();
      }


  ngOnInit(): void {

this.usuarioService.Get().subscribe({

    next: (data:DefaultDataResponse<PaginationReponse<Usuario>>) => {

      this.pageData = data?.data;

    },
    error: (error) => {}

  });
  }





}
