import { HttpErrorResponse } from "@angular/common/http";
import { Component,   OnChanges, OnInit, Output } from "@angular/core";
import { FormBuilder,  FormGroup,  Validators } from "@angular/forms";
import { Usuario } from "src/app/business/entities/model/usuario";
import { DefaultDataResponse } from "src/app/business/entities/response/default-data-response";
import { UsuarioService } from "src/app/services/core/api/usuario-service.service";
import { GlobalModalService } from "src/app/services/core/static/global-modal.service";
import { LoadingIconService } from "src/app/services/core/static/loading-icon.service";

@Component({

  selector: "usuario-change-senha-form",
  templateUrl: "usuario-change-senha-form.component.html"

})
export class UsuarioChangeSenhaFormComponent implements OnInit, OnChanges {

    passwordConferencia!: string;
  formGroup!: FormGroup;


  constructor(public  formBuilder: FormBuilder, public  dataService: UsuarioService) {
  }

  onSenhaValueChanges($event:any) {
   this.passwordConferencia = $event.target.value;
  }


  Submit() {
    LoadingIconService.show();
      this.dataService.Patch(this.formGroup.value).subscribe({


        next: (data:DefaultDataResponse<Usuario>) => {
          LoadingIconService.hide();
          GlobalModalService.open("Senha alterada com sucesso");
        },

        error: (err: HttpErrorResponse) => {
              console.log(err);

              if(err.status == 500)
              GlobalModalService.open("Não foi possível alterar sua senha, por gentileza contate o administrador do sistema");

              if(err.status != 500)
              GlobalModalService.open("Senha incorreta ou sessão expirada");

              LoadingIconService.hide();

        }


      });

  }

  initForm() {

          this.formGroup = this.formBuilder.group({

            password: [ '', [Validators.required]],
            oldPassword:[ '',  [Validators.required]]

        });
  }

   ngOnChanges() {
    console.log("onChangesUsuarioForm");
    this.initForm();

  }

   ngOnInit(): void {
    console.log("onInitUsuarioForm");
    this.initForm();
  }

}
