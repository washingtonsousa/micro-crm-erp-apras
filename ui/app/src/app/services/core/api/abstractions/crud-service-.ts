import { Observable } from "rxjs";
import { DefaultDataResponse } from "src/app/business/entities/response/default-data-response";



export interface ICrudService<T> {



  GetById(id: number) : Observable<DefaultDataResponse<T>>;

  Subscribe( usuario: T) : Observable<DefaultDataResponse<T>>;

  Update( usuario: T, aditionalParams: any[] ) : Observable<DefaultDataResponse<T>>;

  Remove(id: number ) : Observable<DefaultDataResponse<boolean>>;


}
