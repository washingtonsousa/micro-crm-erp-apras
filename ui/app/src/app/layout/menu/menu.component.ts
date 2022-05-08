import { Component, Output , EventEmitter} from "@angular/core";


@Component({
  templateUrl: "menu.component.html",
  selector: "menu",
  styleUrls: ["menu.scss"]
})
export class MenuComponent {

      @Output("barsClick") barsClick: EventEmitter<any> = new EventEmitter<any>();



}
