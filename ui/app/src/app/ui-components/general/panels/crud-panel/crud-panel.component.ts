import { Component, Output, EventEmitter, Input } from "@angular/core";
import { PaginationReponse } from "src/app/business/entities/response/pagination-response";


@Component({
  selector: "crud-panel",
  templateUrl: "crud-panel.component.html",
  styleUrls: ["crud-panel.scss"]
})
export class CrudPanelComponent {

  @Output("onAddClick") onAddClick: EventEmitter<any> = new EventEmitter<any>();
  @Output("onSearchClick") onSearchClick: EventEmitter<any> = new EventEmitter<any>();
  order: string = "DESC";
  @Input("pageData") paginationResponse!:  PaginationReponse<any>;
  @Output("onItensPerPageChange") onItensPerPageChange: EventEmitter<number> = new EventEmitter<number>();
  @Output("onCurrentPageChanges") onCurrentPageChanges: EventEmitter<number> = new EventEmitter<number>();
  @Output("onChangeOrdering") onChangeOrdering: EventEmitter<string> = new EventEmitter<string>();
  searchValue: string = '';


  onItensPerPageChangeFunction($event:any) {
    this.onItensPerPageChange.emit($event.target.value);
  }

  toggleOrdering() {
      this.order = this.order == "DESC" ? "ASC" : "DESC";
      this.onChangeOrdering.emit(this.order);
  }



  next() {

    if(this.paginationResponse?.totalPages > this.paginationResponse.page)
    this.onCurrentPageChanges.emit(this.paginationResponse.page + 1);
  }

  back() {
    if(this.paginationResponse?.page > 1)
    this.onCurrentPageChanges.emit(this.paginationResponse.page - 1);
  }

}
