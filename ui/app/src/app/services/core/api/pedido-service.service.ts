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
import { Pedido } from "src/app/business/entities/model/pedido";

@Injectable()
export class PedidoService implements IPaginatedCrudService<Pedido> {

      constructor(private http:HttpClient) {

      }

      public Get(request: PaginationDataRequest<Pedido>) : Observable<DefaultDataResponse<PaginationReponse<Pedido>>> {
        return this.http.get<DefaultDataResponse<PaginationReponse<Pedido>>>(
          environment.apiUri +
          "/api/pedido/",  {
          params: request.ToHTTPParams()
        }

          )
          ;
      }

      public GetById(id: number) : Observable<DefaultDataResponse<Pedido>> {
        return this.http.get<DefaultDataResponse<Pedido>>(
          environment.apiUri +
          "/api/pedido/" + id
          )
          ;
      }

      public Subscribe( Pedido: Pedido) : Observable<DefaultDataResponse<Pedido>> {
        return this.http.post<DefaultDataResponse<Pedido>>(environment.apiUri + "/api/pedido/", Pedido);
      }

      public Update( Pedido: Pedido, aditionalParams:any[] = [false]) : Observable<DefaultDataResponse<Pedido>> {
        return this.http.put<DefaultDataResponse<Pedido>>(environment.apiUri + "/api/pedido/" + Pedido.idPedido, Pedido,  { params: { changeSenha: aditionalParams[0] }});
      }

      public Remove(id: number ) : Observable<DefaultDataResponse<boolean>> {
        return this.http.delete<DefaultDataResponse<boolean>>(environment.apiUri + "/api/pedido/" + id);
      }



}
