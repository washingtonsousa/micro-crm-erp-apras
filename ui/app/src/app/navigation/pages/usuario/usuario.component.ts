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
import { CrudPageTemplate } from "../../abstractions/template/crud-page-template";



@Component({
  selector: "usuario",
  templateUrl: "usuario.component.html"
})
export class UsuarioComponent extends CrudPageTemplate<Usuario> implements OnInit {

     @ViewChild("modalUsuarioUpdate") modalUsuarioUpdate!: CleanModalComponent;


     currentUsuarioForUpdate: Usuario = new Usuario();

      constructor(public override dataService:  UsuarioService,
        public override changeDetector: ChangeDetectorRef){

          super();

      }

      loadUserForUpdate($event:number) {

        super.loadForUpdate($event, () => {

          this.modalUsuarioUpdate.openModal();

        });

      }



 override ngOnInit(): void {

    super.ngOnInit();

  }





}
