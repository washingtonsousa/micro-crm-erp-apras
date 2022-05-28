import { ChangeDetectorRef, Component, OnInit, ViewChild } from "@angular/core";
import { Usuario } from "src/app/business/entities/model/usuario";
import { UsuarioService } from "src/app/services/core/api/usuario-service.service";
import { CleanModalComponent } from "src/app/ui-components/material/modal/clean-modal/clean-modal.component";
import { CrudPageTemplate } from "../../abstractions/template/crud-page-template";

@Component({
  selector: "usuario",
  templateUrl: "usuario.component.html"
})
export class UsuarioComponent extends CrudPageTemplate<Usuario> implements OnInit {

     @ViewChild("modalUsuarioUpdate") modalUsuarioUpdate!: CleanModalComponent;


     override currentEntityForUpdate: Usuario = new Usuario();

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
