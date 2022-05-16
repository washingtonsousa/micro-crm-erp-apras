import { Injectable } from "@angular/core";
import { HttpClient } from '@angular/common/http';
import { TokenResponse } from "../../../business/entities/response/token-response";
import { Observable } from "rxjs";
import { environment } from '../../../../environments/environment';
import { TokenRequest } from "../../../business/entities/request/token-request";
import { DefaultDataResponse } from "src/app/business/entities/response/default-data-response";
import { PaginationReponse } from "src/app/business/entities/response/pagination-response";
import { PaginationDataRequest } from "src/app/business/entities/request/pagination-data-request";
import { IPaginatedCrudService } from "./abstractions/paginated-crud-service";
import { Cliente } from "src/app/business/entities/model/cliente";
import { ClienteImagem } from "src/app/business/entities/model/cliente-imagem";

@Injectable()
export class ClienteService implements IPaginatedCrudService<Cliente> {

      constructor(private http:HttpClient) {

      }


      public Get(request: PaginationDataRequest<Cliente>) : Observable<DefaultDataResponse<PaginationReponse<Cliente>>> {
        return this.http.get<DefaultDataResponse<PaginationReponse<Cliente>>>(
          environment.apiUri +
          "/api/cliente/",  {
          params: request.ToHTTPParams()
        }

          )
          ;
      }

      public GetById(id: number) : Observable<DefaultDataResponse<Cliente>> {
        return this.http.get<DefaultDataResponse<Cliente>>(
          environment.apiUri +
          "/api/cliente/" + id
          )
          ;
      }

      public Subscribe( Cliente: Cliente) : Observable<DefaultDataResponse<Cliente>> {
        return this.http.post<DefaultDataResponse<Cliente>>(environment.apiUri + "/api/cliente/", Cliente);
      }

      public UploadClienteLogo(id:number, file: File) : Observable<DefaultDataResponse<ClienteImagem>> {

        var formData = new FormData();
        console.log(file.name.split('.').pop());
        formData.append('logo', file, "logo." + file.name.split('.').pop());
        return this.http.post<DefaultDataResponse<ClienteImagem>>(environment.apiUri + "/api/cliente/"+id+"/imagem/", formData);

      }

      public Update( Cliente: Cliente, aditionalParams:any[] = [false]) : Observable<DefaultDataResponse<Cliente>> {
        return this.http.put<DefaultDataResponse<Cliente>>(environment.apiUri + "/api/cliente/" + Cliente.idCliente, Cliente,  { params: { changeSenha: aditionalParams[0] }});
      }

      public Remove(id: number ) : Observable<DefaultDataResponse<boolean>> {
        return this.http.delete<DefaultDataResponse<boolean>>(environment.apiUri + "/api/cliente/" + id);
      }



}
