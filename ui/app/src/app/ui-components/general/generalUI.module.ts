import { CommonModule } from "@angular/common";
import { NgModule } from "@angular/core";
import { FormsModule } from "@angular/forms";
import { BrowserModule } from "@angular/platform-browser";
import { TooltipModule } from "ngx-bootstrap/tooltip";
import { FlexBoxModule } from "../flex-box/flex-box.module";
import { CrudPanelComponent } from "./panels/crud-panel/crud-panel.component";
import { ShowcasePanelComponent } from "./panels/showcase-panel/showcase-panel.component";



@NgModule({
  imports: [CommonModule, FormsModule, BrowserModule, FlexBoxModule, TooltipModule],
  exports: [CrudPanelComponent, ShowcasePanelComponent],
  declarations: [CrudPanelComponent, ShowcasePanelComponent],
  providers: []
})
export class GeneralUIModule {

}
