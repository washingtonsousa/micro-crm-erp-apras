import { HttpParams } from "@angular/common/http";
import { Produto } from "../model/produto";
import { PaginationDataRequest } from "./pagination-data-request";

export class ProdutoPaginationDataRequest extends PaginationDataRequest<Produto> {

   public tamanho:string = '';


   constructor(tamanho:string = '', page:number = 1, pageSize:number = 4, order:string = "DESC") {

      super(page, pageSize, order);
      this.tamanho = tamanho;

   }




}
