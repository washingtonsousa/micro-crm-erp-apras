import { Observable } from "rxjs";
import { Usuario } from "src/app/business/entities/model/usuario";
import { PaginationDataRequest } from "src/app/business/entities/request/pagination-data-request";
import { DefaultDataResponse } from "src/app/business/entities/response/default-data-response";
import { PaginationReponse } from "src/app/business/entities/response/pagination-response";
import { ICrudService } from "./crud-service-";



export interface IPaginatedCrudService<T> extends ICrudService<T> {

   Get(request: PaginationDataRequest<T>) : Observable<DefaultDataResponse<PaginationReponse<T>>>;

}
