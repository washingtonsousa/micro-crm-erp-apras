import { HttpErrorResponse } from "@angular/common/http";
import { Component, EventEmitter, OnInit, Output } from "@angular/core";
import { FormBuilder, FormGroup, Validators } from "@angular/forms";
import { DefaultDataResponse } from "src/app/business/entities/response/default-data-response";
import { TokenResponse } from "src/app/business/entities/response/token-response";
import { UsuarioService } from "src/app/services/core/api/usuario-service.service";




@Component({
  templateUrl:"login-form.component.html",
  selector:"login-form"
})
export class LoginFormComponent implements OnInit {

      loginFormGroup!: FormGroup;
      @Output("onSuccess") onSuccess: EventEmitter<TokenResponse> = new  EventEmitter<TokenResponse>();
      @Output("onFail") onFail: EventEmitter<any> = new  EventEmitter<any>();

      constructor(private formBuilder: FormBuilder, private loginService: UsuarioService) {

      }

      Login() {

        this.loginService.Login(this.loginFormGroup.value).subscribe({

          next:  (data:DefaultDataResponse<TokenResponse>) => {
            this.onSuccess.emit(data.data);
          },
          error:(data:HttpErrorResponse) => {
            this.onFail.emit(data);
            console.log(data);
          },

        }


        );
      }



      ngOnInit(): void {
        this.loginFormGroup = this.formBuilder.group({
          username: ['', [Validators.required]],
              password: ['', [Validators.required]],

            });
      }




}
