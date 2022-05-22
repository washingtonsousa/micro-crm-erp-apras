import { HttpParams } from "@angular/common/http";

export class PaginationDataRequest<T> {

   public pageSize!:number;
   public page!:number;
   public order:string = "DESC";
   public term: string = '';

   constructor(page:number = 1, pageSize:number = 4, order:string = "DESC") {
     this.pageSize = pageSize;
     this.page = page;
     this.order = order;
   }

   public ToHTTPParams() : any {

     return this;

   }


}
