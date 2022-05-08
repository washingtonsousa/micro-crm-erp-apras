import { CommonModule } from "@angular/common";
import { NgModule } from "@angular/core";
import { FormsModule } from "@angular/forms";
import { BrowserModule } from "@angular/platform-browser";
import { TooltipModule } from "ngx-bootstrap/tooltip";
import { FlexBoxModule } from "../flex-box/flex-box.module";
import { CrudPanelComponent } from "./panels/crud-panel/crud-panel.component";



@NgModule({
  imports: [CommonModule, FormsModule, BrowserModule, FlexBoxModule, TooltipModule],
  exports: [CrudPanelComponent],
  declarations: [CrudPanelComponent],
  providers: []
})
export class GeneralUIModule {

}
