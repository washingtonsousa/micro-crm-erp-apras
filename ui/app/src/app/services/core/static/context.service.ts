import { Injectable } from "@angular/core";
import { TokenResponse } from "src/app/business/entities/response/token-response";
import { Context } from "src/app/business/entities/singleton/context.model";



export class ContextService {

        public static HandleTokenResponse(tokenResponse: TokenResponse) {

            localStorage.setItem("token", tokenResponse.token);

        }

        public static GetContext() {
          console.log(localStorage.getItem("token"));
          let  AuthToken =  (localStorage.getItem("token") == undefined || localStorage.getItem("token") == null) ? "" : localStorage.getItem("token");
          return new Context(AuthToken);

        }

        static get isLoggedIn(): boolean {
          console.log(this.GetContext().token != null && this.GetContext().token != "");
          return this.GetContext().token != null && this.GetContext().token != "";

        }




}
