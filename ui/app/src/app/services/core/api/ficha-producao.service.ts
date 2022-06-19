import { HttpClient } from "@angular/common/http";
import { Injectable } from "@angular/core";
import { Observable } from "rxjs";
import { FichaProducao } from "src/app/business/entities/model/ficha-producao";
import { PaginationDataRequest } from "src/app/business/entities/request/pagination-data-request";
import { DefaultDataResponse } from "src/app/business/entities/response/default-data-response";
import { PaginationReponse } from "src/app/business/entities/response/pagination-response";
import { environment } from '../../../../environments/environment';
import { IPaginatedCrudService } from "./abstractions/paginated-crud-service";

@Injectable()
export class FichaProducaoService implements IPaginatedCrudService<FichaProducao> {

  constructor(private http:HttpClient) {

  }


  public GetById(id: number) : Observable<DefaultDataResponse<FichaProducao>> {
    return this.http.get<DefaultDataResponse<FichaProducao>>(
      environment.apiUri +
      "/api/ficha_producao/" + id
      );
  }

  Subscribe(entity: FichaProducao): Observable<DefaultDataResponse<FichaProducao>> {

    return this.http.post<DefaultDataResponse<FichaProducao>>(environment.apiUri + "/api/ficha_producao/", entity);


  }
  Update(entity: FichaProducao, aditionalParams: any[]): Observable<DefaultDataResponse<FichaProducao>> {
    throw new Error("Method not implemented.");
  }
  Remove(id: number): Observable<DefaultDataResponse<boolean>> {
    throw new Error("Method not implemented.");
  }

  public Get(request: PaginationDataRequest<FichaProducao>) : Observable<DefaultDataResponse<PaginationReponse<FichaProducao>>> {
    return this.http.get<DefaultDataResponse<PaginationReponse<FichaProducao>>>(
      environment.apiUri +
      "/api/ficha_producao/",  {
      params: request.ToHTTPParams()
    }

      )
      ;
  }


}
