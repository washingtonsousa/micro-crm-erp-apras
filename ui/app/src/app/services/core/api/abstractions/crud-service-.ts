import { Observable } from "rxjs";
import { DefaultDataResponse } from "src/app/business/entities/response/default-data-response";



export interface ICrudService<T> {



  GetById(id: number) : Observable<DefaultDataResponse<T>>;

  Subscribe( entity: T) : Observable<DefaultDataResponse<T>>;

  Update( entity: T, aditionalParams: any[] ) : Observable<DefaultDataResponse<T>>;

  Remove(id: number ) : Observable<DefaultDataResponse<boolean>>;


}
