import { HttpParams } from "@angular/common/http";
import { Produto } from "../model/produto";
import { PaginationDataRequest } from "./pagination-data-request";

export class ProdutoPaginationDataRequest extends PaginationDataRequest<Produto> {

   public codigoCliente:string = '';


   constructor(codigoCliente:string = '', page:number = 1, pageSize:number = 4, order:string = "DESC") {

      super(page, pageSize, order);
      this.codigoCliente = codigoCliente;

   }




}
