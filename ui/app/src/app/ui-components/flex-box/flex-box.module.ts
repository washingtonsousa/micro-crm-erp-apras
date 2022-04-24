import { CommonModule } from "@angular/common";
import { NgModule } from "@angular/core";
import { BrowserModule } from "@angular/platform-browser";
import { BoxContainerComponent } from "./box-container/box-container.component";



@NgModule({
  imports: [CommonModule, BrowserModule],
  exports: [BoxContainerComponent],
  declarations: [BoxContainerComponent],
  providers: []
})
export class FlexBoxModule {

}
