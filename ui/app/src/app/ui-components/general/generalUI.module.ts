import { CommonModule } from "@angular/common";
import { NgModule } from "@angular/core";
import { FormsModule } from "@angular/forms";
import { BrowserModule } from "@angular/platform-browser";
import { TooltipModule } from "ngx-bootstrap/tooltip";
import { FlexBoxModule } from "../flex-box/flex-box.module";
import { CrudContainerComponent } from "./panels/crud-container/crud-container.component";
import { CrudPanelComponent } from "./panels/crud-panel/crud-panel.component";



@NgModule({
  imports: [CommonModule, FormsModule, BrowserModule, FlexBoxModule, TooltipModule],
  exports: [CrudPanelComponent, CrudContainerComponent],
  declarations: [CrudPanelComponent, CrudContainerComponent],
  providers: []
})
export class GeneralUIModule {

}
