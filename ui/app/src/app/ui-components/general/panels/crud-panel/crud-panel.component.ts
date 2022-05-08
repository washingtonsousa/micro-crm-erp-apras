import { Component, Output, EventEmitter } from "@angular/core";


@Component({
  selector: "crud-panel",
  templateUrl: "crud-panel.component.html",
  styleUrls: ["crud-panel.scss"]
})
export class CrudPanelComponent {

  @Output("onAddClick") onAddClick: EventEmitter<any> = new EventEmitter<any>();
  @Output("onSearchClick") onSearchClick: EventEmitter<any> = new EventEmitter<any>();
  searchValue!: string;



}
