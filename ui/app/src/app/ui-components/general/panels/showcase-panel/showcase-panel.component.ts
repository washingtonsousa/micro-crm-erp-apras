import { Component, Output, EventEmitter, Input, OnChanges, SimpleChanges } from "@angular/core";
import { PaginationReponse } from "src/app/business/entities/response/pagination-response";


@Component({
  selector: "showcase-panel",
  templateUrl: "showcase-panel.component.html",
  styleUrls: ["showcase-panel.scss"]
})
export class ShowcasePanelComponent   {

  @Output("onRefreshClick") onRefreshClick: EventEmitter<any> = new EventEmitter<any>();
  @Output("onSearchClick") onSearchClick: EventEmitter<any> = new EventEmitter<any>();
  order: string = "DESC";
  @Input("pageData") paginationResponse!:  PaginationReponse<any>;
  @Output("onItensPerPageChange") onItensPerPageChange: EventEmitter<number> = new EventEmitter<number>();
  @Output("onCurrentPageChanges") onCurrentPageChanges: EventEmitter<number> = new EventEmitter<number>();
  @Output("onChangeOrdering") onChangeOrdering: EventEmitter<string> = new EventEmitter<string>();
  searchValue: string = '';


  get numbers() {

    var numbers: number[] = [];

    let controlsNumber = 5;

    let maxPages = this.paginationResponse.totalPages >= controlsNumber ?

    controlsNumber : this.paginationResponse.totalPages;

    let i = 1;

    let maxOffset = this.paginationResponse.totalPages - controlsNumber == this.paginationResponse.page
    ?
    this.paginationResponse.page
    :

   Math.ceil(controlsNumber / 2)

    ;

    let offset = this.paginationResponse.page > 1 ? maxOffset : this.paginationResponse.page;

    while(i <= maxPages) {

      if(offset <= this.paginationResponse.totalPages)
      numbers.push(offset);
      offset++;
      i++;

    }

    return numbers;

  }



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
