import { CommonModule } from "@angular/common";
import { NgModule } from "@angular/core";
import { BrowserModule } from "@angular/platform-browser";
import { SimpleCardComponent } from "./card/simple-card/simple-card.component";



@NgModule({
  imports: [CommonModule, BrowserModule],
  exports: [SimpleCardComponent],
  declarations: [SimpleCardComponent],
  providers: []
})
export class MaterialModule {

}
