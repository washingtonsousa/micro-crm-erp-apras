import { HttpParams } from "@angular/common/http";
import { FichaProducaoEstado } from "../../enums/ficha-producao-estado.enum";
import { FichaProducao } from "../model/ficha-producao";
import { Produto } from "../model/produto";
import { PaginationDataRequest } from "./pagination-data-request";

export class FichaProducaoDataRequest extends PaginationDataRequest<FichaProducao> {

   public estadoFicha:any = '';
   public idCliente:any= '';


   constructor(page:number = 1, pageSize:number = 4, order:string = "DESC") {

      super(page, pageSize, order);

   }




}
