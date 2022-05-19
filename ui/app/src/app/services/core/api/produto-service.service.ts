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
import { Produto } from "src/app/business/entities/model/produto";
import { ProdutoImagem } from "src/app/business/entities/model/produto-imagem";

@Injectable()
export class ProdutoService implements IPaginatedCrudService<Produto> {

      constructor(private http:HttpClient) {

      }


      public Get(request: PaginationDataRequest<Produto>) : Observable<DefaultDataResponse<PaginationReponse<Produto>>> {
        return this.http.get<DefaultDataResponse<PaginationReponse<Produto>>>(
          environment.apiUri +
          "/api/produto/",  {
          params: request.ToHTTPParams()
        }

          )
          ;
      }

      public GetById(id: number) : Observable<DefaultDataResponse<Produto>> {
        return this.http.get<DefaultDataResponse<Produto>>(
          environment.apiUri +
          "/api/produto/" + id
          )
          ;
      }

      public Subscribe( Produto: Produto) : Observable<DefaultDataResponse<Produto>> {
        return this.http.post<DefaultDataResponse<Produto>>(environment.apiUri + "/api/produto/", Produto);
      }

      public UploadProdutoLogo(id:number, file: File) : Observable<DefaultDataResponse<ProdutoImagem>> {

        var formData = new FormData();
        console.log(file.name.split('.').pop());
        formData.append('produtoImg', file, "produtoImg." + file.name.split('.').pop());
        return this.http.post<DefaultDataResponse<ProdutoImagem>>(environment.apiUri + "/api/produto/"+id+"/imagem/", formData);

      }

      public Update( Produto: Produto, aditionalParams:any[] = [false]) : Observable<DefaultDataResponse<Produto>> {
        return this.http.put<DefaultDataResponse<Produto>>(environment.apiUri + "/api/produto/" + Produto.idProduto, Produto,  { params: { changeSenha: aditionalParams[0] }});
      }

      public Remove(id: number ) : Observable<DefaultDataResponse<boolean>> {
        return this.http.delete<DefaultDataResponse<boolean>>(environment.apiUri + "/api/produto/" + id);
      }



}
