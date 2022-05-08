import { HttpErrorResponse } from "@angular/common/http";
import { Component, EventEmitter, Output } from "@angular/core";
import { FormBuilder, FormGroup, Validators } from "@angular/forms";
import { Usuario } from "src/app/business/entities/model/usuario";
import { DefaultDataResponse } from "src/app/business/entities/response/default-data-response";
import { UsuarioService } from "src/app/services/core/api/usuario-service.service";
import { LoadingIconService } from "src/app/services/core/static/loading-icon.service";



@Component({

  selector: "usuario-form",
  templateUrl: "usuario-form.component.html"

})
export class UsuarioFormComponent {

  usuarioFormGroup!: FormGroup;
  senhaConferencia!: string;

  @Output("onSuccess") onSuccess: EventEmitter<Usuario> = new  EventEmitter<Usuario>();
  @Output("onFail") onFail: EventEmitter<any> = new  EventEmitter<any>();

  constructor(private formBuilder: FormBuilder, private loginService: UsuarioService) {

  }

  onSenhaValueChanges($event:any) {
   this.senhaConferencia = $event.target.value;
  }

  Subscribe() {

    LoadingIconService.show("Aguarde um momento...");

    this.loginService.Subscribe(this.usuarioFormGroup.value).subscribe({

      next:  (data:DefaultDataResponse<Usuario>) => {
        this.onSuccess.emit(data.data);
      },
      error:(data:HttpErrorResponse) => {
        this.onFail.emit(data.error);
        console.log(data);
        LoadingIconService.hide();
      },
      complete: () => {

        this.usuarioFormGroup.reset();
        this.senhaConferencia = "";
        LoadingIconService.hide();

      }
    });

  }



  ngOnInit(): void {
    this.usuarioFormGroup = this.formBuilder.group({

      nome: ['', [Validators.required]],
      email: ['', [Validators.required]],
      documento: ['', [Validators.required]],
      nivelAcesso: ['', [Validators.required]],
      senha: ['', [Validators.required]]

        });
  }

}
