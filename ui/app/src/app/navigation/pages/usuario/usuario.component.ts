import { ChangeDetectorRef, Component, OnInit, ViewChild } from "@angular/core";
import { Usuario } from "src/app/business/entities/model/usuario";
import { PaginationDataRequest } from "src/app/business/entities/request/pagination-data-request";
import { DefaultDataResponse } from "src/app/business/entities/response/default-data-response";
import { PaginationReponse } from "src/app/business/entities/response/pagination-response";
import { UsuarioService } from "src/app/services/core/api/usuario-service.service";
import { GlobalModalService } from "src/app/services/core/static/global-modal.service";
import { LoadingIconService } from "src/app/services/core/static/loading-icon.service";
import { CleanModalComponent } from "src/app/ui-components/material/modal/clean-modal/clean-modal.component";
import { GlobalModalConfig } from "src/app/ui-components/material/modal/global-modal/global-modal";



@Component({
  selector: "usuario",
  templateUrl: "usuario.component.html"
})
export class UsuarioComponent implements OnInit {

     @ViewChild("modalUsuarioUpdate") modalUsuarioUpdate!: CleanModalComponent;

     pageData!: PaginationReponse<Usuario>;
     notifications: any[] = [];
     request:PaginationDataRequest<Usuario> = new PaginationDataRequest<Usuario>(1,4);
     currentUsuarioForUpdate: Usuario = new Usuario();

      constructor(private usuarioService:  UsuarioService, private changeDetector: ChangeDetectorRef){
      }

      loadUserForUpdate($event:number) {

        LoadingIconService.show();

        this.usuarioService.GetById($event).subscribe({
          next: (data:DefaultDataResponse<Usuario>) => {

            this.modalUsuarioUpdate.openModal();
            LoadingIconService.hide();
            this.currentUsuarioForUpdate = data.data;
            console.log(data);
            this.changeDetector.detectChanges();

          }
        })
      }

      onItemsPerPageChange(pageSize:number) {
        this.request.pageSize = pageSize;
        this.loadUsuarios();
      }

      onFormFail($event:any) {
            this.notifications = $event?.data;
      }

      onFormSuccess($event:any, message = "Usuário cadastrado com sucesso") {
        this.notifications = [];
        GlobalModalService.open(message);
        this.ngOnInit();
      }




      onChangeSearchTerm($event:any) {
            this.request.term = $event;
            this.loadUsuarios();
      }

      remove(id:number) {

        LoadingIconService.show();

        this.usuarioService.Remove(id).subscribe({

          next: (data:DefaultDataResponse<boolean>) => {
            this.loadUsuarios();
            LoadingIconService.hide();
          },
          error: (error) => {

            GlobalModalService.open("Ocorreu uma falha ao tentar deletar este usuário");

            LoadingIconService.hide();

          }

        });

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
