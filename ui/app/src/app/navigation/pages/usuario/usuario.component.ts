import { Component, OnInit } from "@angular/core";
import { Usuario } from "src/app/business/entities/model/usuario";
import { PaginationDataRequest } from "src/app/business/entities/request/pagination-data-request";
import { DefaultDataResponse } from "src/app/business/entities/response/default-data-response";
import { PaginationReponse } from "src/app/business/entities/response/pagination-response";
import { UsuarioService } from "src/app/services/core/api/usuario-service.service";
import { GlobalModalService } from "src/app/services/core/static/global-modal.service";
import { LoadingIconService } from "src/app/services/core/static/loading-icon.service";
import { GlobalModalConfig } from "src/app/ui-components/material/modal/global-modal/global-modal";



@Component({
  selector: "usuario",
  templateUrl: "usuario.component.html"
})
export class UsuarioComponent implements OnInit {

     pageData!: PaginationReponse<Usuario>;
     notifications: any[] = [];
     request:PaginationDataRequest<Usuario> = new PaginationDataRequest<Usuario>(1,4);

      constructor(private usuarioService:  UsuarioService){
      }

      onItemsPerPageChange(pageSize:number) {
        this.request.pageSize = pageSize;
        this.loadUsuarios();
      }

      onSubscribeFail($event:any) {
            this.notifications = $event?.data;
      }

      onSubscribeSuccess($event:any) {
        this.notifications = [];
        GlobalModalService.open("Usuário cadastrado com sucesso");
        this.ngOnInit();
      }

      onChangeSearchTerm($event:any) {
            this.request.term = $event;
            this.loadUsuarios();
      }


      loadUsuarios() {


        LoadingIconService.show();


        this.usuarioService.Get(this.request).subscribe({

          next: (data:DefaultDataResponse<PaginationReponse<Usuario>>) => {
            this.pageData = data?.data;
            LoadingIconService.hide();

          },
          error: (error) => {

            LoadingIconService.hide();


          }

        });

      }

  ngOnInit(): void {

    this.loadUsuarios();

  }





}
