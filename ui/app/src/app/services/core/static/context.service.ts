import { Injectable } from "@angular/core";
import { TokenResponse } from "src/app/business/entities/response/token-response";
import { Context } from "src/app/business/entities/singleton/context.model";



export class ContextService {

        public static HandleTokenResponse(tokenResponse: TokenResponse) {
            localStorage.setItem("token", tokenResponse.token);
        }

        public static GetContext() {
          let  AuthToken =  (localStorage.getItem("token") == undefined || localStorage.getItem("token") == null) ? "" : localStorage.getItem("token");
          return new Context(AuthToken == null ? "" : AuthToken);
        }

        static get isLoggedIn(): boolean {
          return this.GetContext().token != null && this.GetContext().token != "";
        }

        static logout() {
          localStorage.setItem("token", '');
        }




}
