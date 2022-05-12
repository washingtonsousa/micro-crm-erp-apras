import { HttpErrorResponse } from "@angular/common/http";
import { Component, EventEmitter, Input, OnChanges, OnInit, Output } from "@angular/core";
import { FormBuilder, FormGroup, Validators } from "@angular/forms";
import { Usuario } from "src/app/business/entities/model/usuario";
import { DefaultDataResponse } from "src/app/business/entities/response/default-data-response";
import { UsuarioService } from "src/app/services/core/api/usuario-service.service";
import { LoadingIconService } from "src/app/services/core/static/loading-icon.service";

@Component({

  selector: "usuario-form",
  templateUrl: "usuario-form.component.html"

})
export class UsuarioFormComponent implements OnInit, OnChanges {

  usuarioFormGroup!: FormGroup;
  senhaConferencia!: string;

  @Output("onSuccess") onSuccess: EventEmitter<Usuario> = new  EventEmitter<Usuario>();
  @Output("onFail") onFail: EventEmitter<any> = new  EventEmitter<any>();
  @Input("usuario") usuario:Usuario = new Usuario();

  updateMode = false;
  changeSenhaToggle = false;

  get enableSwitchSenhaForm() : boolean {

    return !this.updateMode || this.changeSenhaToggle;

  }


  constructor(private formBuilder: FormBuilder, private loginService: UsuarioService) {

  }

  onSenhaValueChanges($event:any) {
   this.senhaConferencia = $event.target.value;
  }

  Submit() {

    LoadingIconService.show("Aguarde um momento...");

    var observable =  this.updateMode ? this.loginService.Update(this.usuarioFormGroup.value, this.changeSenhaToggle) :  this.loginService.Subscribe(this.usuarioFormGroup.value);

    observable.subscribe({

      next:  (data:DefaultDataResponse<Usuario>) => {
        this.changeSenhaToggle = false;
        this.onSuccess.emit(data.data);
      },
      error:(data:HttpErrorResponse) => {

        this.onFail.emit(data.error);
        LoadingIconService.hide();

      },
      complete: () => {

        this.usuarioFormGroup.reset();
        this.senhaConferencia = "";
        LoadingIconService.hide();

      }
    });

  }

  initForm() {

    this.updateMode = this.usuario.idUsuario > 0;

          this.usuarioFormGroup = this.formBuilder.group({

            idUsuario: [this.usuario.idUsuario],
            nome: [this.usuario.nome, [Validators.required]],
            email: [this.usuario.email, [Validators.required]],
            documento: [ { value: this.usuario.documento, disabled: this.updateMode }, [Validators.required]],
            nivelAcesso: [this.usuario.nivelAcesso, [Validators.required]],
            senha: [{ value: '', disabled: !this.enableSwitchSenhaForm }, [Validators.required, Validators.minLength(8)]]

        });
  }

  ngOnChanges() {
    this.initForm();
  }

  ngOnInit(): void {

    this.initForm();

  }

}
