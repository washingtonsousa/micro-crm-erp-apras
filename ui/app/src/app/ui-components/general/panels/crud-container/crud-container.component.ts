import { Component, Output, EventEmitter, Input, OnChanges, SimpleChanges } from "@angular/core";
import { PaginationReponse } from "src/app/business/entities/response/pagination-response";


@Component({
  selector: "crud-container",
  template: `

<div class="container" class="mt-3">

        <ng-content></ng-content>

<div class="row">

  <div class="controls-area col-xl-12 w-100 d-flex justify-content-end p-4">

      <button class="btn btn-success btn-lg" (click)="onAddClick.emit()"> <i class="fas fa-plus"></i> </button>

  </div>

</div>

</div>



  `,

styleUrls: ["crud-container.scss"]
})
export class CrudContainerComponent   {


  @Output("onAddClick") onAddClick: EventEmitter<any> = new EventEmitter<any>();

}
