import { Component,  Input, OnChanges, OnInit, Output } from "@angular/core";
import { FormBuilder,  Validators } from "@angular/forms";
import { Usuario } from "src/app/business/entities/model/usuario";
import { DefaultDataResponse } from "src/app/business/entities/response/default-data-response";
import { UsuarioService } from "src/app/services/core/api/usuario-service.service";
import { UpdateCreateReactiveForm } from "../../forms/abstractions/update-create-reactive-form";

@Component({

  selector: "usuario-form",
  templateUrl: "usuario-form.component.html"

})
export class UsuarioFormComponent extends UpdateCreateReactiveForm<Usuario> implements OnInit, OnChanges {

  senhaConferencia!: string;
   @Input("entity") override entity:Usuario = new Usuario();

  changeSenhaToggle = false;

  get enableSwitchSenhaForm() : boolean {

    return !this.updateMode || this.changeSenhaToggle;

  }


  constructor(public override formBuilder: FormBuilder, public override dataService: UsuarioService) {
    super();
  }

  onSenhaValueChanges($event:any) {
   this.senhaConferencia = $event.target.value;
  }



  Submit() {


    super.OnSubmit([this.changeSenhaToggle], (data:DefaultDataResponse<Usuario>) => {
      this.onSuccess.emit(data.data);
      this.senhaConferencia = "";
      this.changeSenhaToggle = false;
    });

  }

  initForm() {

    this.updateMode = this.entity.idUsuario > 0;

          this.formGroup = this.formBuilder.group({

            idUsuario: [this.entity.idUsuario],
            nome: [this.entity.nome, [Validators.required]],
            email: [this.entity.email, [Validators.required]],
            documento: [ { value: this.entity.documento, disabled: this.updateMode }, [Validators.required]],
            nivelAcesso: [this.entity.nivelAcesso, [Validators.required]],
            senha: [{ value: '', disabled: !this.enableSwitchSenhaForm }, [Validators.required, Validators.minLength(8)]]

        });
  }

  override ngOnChanges() {
    console.log("onChangesUsuarioForm");
    this.initForm();
    console.log("onChangesUsuarioFormUpdateMode: " +  this.updateMode)
    console.log("onChangesUsuarioFormEnableChangeSenhaForm: " +  this.enableSwitchSenhaForm)

  }

  override ngOnInit(): void {
    console.log("onInitUsuarioForm");
    this.initForm();
  }

}
