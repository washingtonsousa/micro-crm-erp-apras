import { Component,   OnChanges, OnInit, Output } from "@angular/core";
import { FormBuilder,  FormGroup,  Validators } from "@angular/forms";
import { UsuarioService } from "src/app/services/core/api/usuario-service.service";

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
