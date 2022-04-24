import { HttpErrorResponse } from "@angular/common/http";
import { ViewEncapsulation } from "@angular/compiler";
import { Component } from "@angular/core";
import { Router, RouterOutlet } from "@angular/router";
import { TokenResponse } from "src/app/business/entities/response/token-response";
import { ContextService } from "src/app/services/core/static/context.service";
import { Alert } from "src/app/ui-components/flex-box/abstractions/interfaces/alert";

@Component({
  selector: "login",
  templateUrl: "login.component.html",
  styleUrls: ["./login.scss"]
})
export class LoginComponent {

  alerts: Alert[] = [];


  constructor(private route: Router) {

  }


  onLogin(tokenResponse:TokenResponse) {

              ContextService.HandleTokenResponse(tokenResponse);
              this.route.navigate(["/"]);
  }

  onError(errorResponse:HttpErrorResponse) {

    this.alerts = [{

      type: "danger",
      message: errorResponse.status == 401 ? "Erro no usuário ou senha" : "Erro crítico, contate o administrador"

    }];

  }

}
