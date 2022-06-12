import { HttpErrorResponse } from "@angular/common/http";
import { Component, Input, OnInit } from "@angular/core";
import { Router } from "@angular/router";
import { TokenResponse } from "src/app/business/entities/response/token-response";
import { ContextService } from "src/app/services/core/static/context.service";
import { GlobalEmitters } from "src/app/services/core/static/global-emitters";
import { Alert } from "src/app/ui-components/flex-box/abstractions/interfaces/alert";

@Component({
  selector: "login",
  templateUrl: "login.component.html",
  styleUrls: ["./login.scss"]
})
export class LoginComponent implements OnInit {

  alerts: Alert[] = [];
  @Input("show") public show:boolean = true;

  constructor(private route: Router) {
  }
  ngOnInit(): void {
    GlobalEmitters.get("login-window").subscribe({

      next: (data:boolean) => {

            this.show = data;

      }

    });
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
