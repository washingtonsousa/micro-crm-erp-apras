import { Injectable } from "@angular/core";
import { HttpClient } from '@angular/common/http';
import { TokenResponse } from "../../../business/entities/response/token-response";
import { Observable } from "rxjs";
import { environment } from '../../../../environments/environment';
import { TokenRequest } from "../../../business/entities/request/token-request";
import { Usuario } from "src/app/business/entities/model/usuario";
import { DefaultDataResponse } from "src/app/business/entities/response/default-data-response";
import { PaginationReponse } from "src/app/business/entities/response/pagination-response";

@Injectable()
export class UsuarioService {

      constructor(private http:HttpClient) {

      }

      public Login(requestData: TokenRequest) : Observable<TokenResponse> {
           return this.http.post<TokenResponse>(environment.apiUri + "/login_check", requestData);
      }

      public Get() : Observable<DefaultDataResponse<PaginationReponse<Usuario>>> {
        return this.http.get<DefaultDataResponse<PaginationReponse<Usuario>>>(environment.apiUri + "/usuario");
      }

      public Subscribe( usuario: Usuario) : Observable<DefaultDataResponse<Usuario>> {
        return this.http.post<DefaultDataResponse<Usuario>>(environment.apiUri + "/usuario", usuario);
      }


}
