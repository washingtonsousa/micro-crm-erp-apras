import { Injectable } from "@angular/core";
import { HttpClient } from '@angular/common/http';
import { TokenResponse } from "../../../business/entities/response/token-response";
import { Observable } from "rxjs";
import { environment } from '../../../../environments/environment';
import { TokenRequest } from "../../../business/entities/request/token-request";

@Injectable()
export class UsuarioService {

      constructor(private http:HttpClient) {

      }

      public Login(requestData: TokenRequest) : Observable<TokenResponse> {
           return this.http.post<TokenResponse>(environment.apiUri + "/login_check", requestData);
      }


}
