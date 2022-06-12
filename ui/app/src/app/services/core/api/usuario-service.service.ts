import { HttpClient } from '@angular/common/http';
import { TokenResponse } from "../../../business/entities/response/token-response";
import { Observable } from "rxjs";
import { environment } from '../../../../environments/environment';
import { TokenRequest } from "../../../business/entities/request/token-request";
import { Usuario } from "src/app/business/entities/model/usuario";
import { DefaultDataResponse } from "src/app/business/entities/response/default-data-response";
import { PaginationReponse } from "src/app/business/entities/response/pagination-response";
import { PaginationDataRequest } from "src/app/business/entities/request/pagination-data-request";
import { IPaginatedCrudService } from "./abstractions/paginated-crud-service";
import { Injectable } from '@angular/core';

@Injectable()
export class UsuarioService implements IPaginatedCrudService<Usuario> {

      constructor(private http:HttpClient) {

      }

      public Login(requestData: TokenRequest) : Observable<DefaultDataResponse<TokenResponse>> {
           return this.http.post<DefaultDataResponse<TokenResponse>>(environment.apiUri + "/login_check", requestData);
      }

      public Get(request: PaginationDataRequest<Usuario>) : Observable<DefaultDataResponse<PaginationReponse<Usuario>>> {
        return this.http.get<DefaultDataResponse<PaginationReponse<Usuario>>>(
          environment.apiUri +
          "/api/usuario",  {
          params: request.ToHTTPParams()
        }

          )
          ;
      }

      public GetById(id: number) : Observable<DefaultDataResponse<Usuario>> {
        return this.http.get<DefaultDataResponse<Usuario>>(
          environment.apiUri +
          "/api/usuario/" + id
          )
          ;
      }

      public Subscribe( usuario: Usuario) : Observable<DefaultDataResponse<Usuario>> {
        return this.http.post<DefaultDataResponse<Usuario>>(environment.apiUri + "/api/usuario", usuario);
      }


      public Update( usuario: Usuario, aditionalParams:any[] = [false]) : Observable<DefaultDataResponse<Usuario>> {
        return this.http.put<DefaultDataResponse<Usuario>>(environment.apiUri + "/api/usuario/" + usuario.idUsuario, usuario,  { params: { changeSenha: aditionalParams[0] }});
      }

      public Remove(id: number ) : Observable<DefaultDataResponse<boolean>> {
        return this.http.delete<DefaultDataResponse<boolean>>(environment.apiUri + "/api/usuario/" + id);
      }

      public Patch(changeSenhaRequestData: any) : Observable<DefaultDataResponse<Usuario>> {
        return this.http.patch<DefaultDataResponse<Usuario>>(environment.apiUri + "/api/usuario/",changeSenhaRequestData);
      }

}
