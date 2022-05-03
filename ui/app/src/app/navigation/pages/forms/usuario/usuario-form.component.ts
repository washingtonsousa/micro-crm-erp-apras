import { Component, EventEmitter, Output } from "@angular/core";
import { FormBuilder, FormGroup, Validators } from "@angular/forms";
import { Usuario } from "src/app/business/entities/model/usuario";
import { DefaultDataResponse } from "src/app/business/entities/response/default-data-response";
import { PaginationReponse } from "src/app/business/entities/response/pagination-response";
import { UsuarioService } from "src/app/services/core/api/usuario-service.service";



@Component({

  selector: "usuario-form",
  templateUrl: "usuario-form.component.html"

})
export class UsuarioFormComponent {
  usuarioFormGroup!: FormGroup;

  @Output("onSuccess") onSuccess: EventEmitter<Usuario> = new  EventEmitter<Usuario>();
  @Output("onFail") onFail: EventEmitter<any> = new  EventEmitter<any>();

  constructor(private formBuilder: FormBuilder, private loginService: UsuarioService) {

  }

  Login() {

    this.loginService.Subscribe(this.usuarioFormGroup.value).subscribe({

      next:  (data:DefaultDataResponse<Usuario>) => {
        this.onSuccess.emit(data);
      },
      error:(data:Usuario) => {
        this.onFail.emit(data);
        console.log(data);
      },
    });

  }



  ngOnInit(): void {
    this.usuarioFormGroup = this.formBuilder.group({
      username: ['', [Validators.required]],
          password: ['', [Validators.required]],

        });
  }

}
