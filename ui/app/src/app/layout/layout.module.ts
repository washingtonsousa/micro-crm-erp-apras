import { CommonModule } from "@angular/common";
import { NgModule } from "@angular/core";
import { BrowserModule } from "@angular/platform-browser";
import { ContainerComponent } from "./container/container.component";
import { HeaderComponent } from "./header/header.component";
import { MenuComponent } from "./menu/menu.component";



@NgModule({
  imports: [CommonModule, BrowserModule],
  exports: [ContainerComponent],
  declarations: [ContainerComponent, MenuComponent, HeaderComponent],
  providers: []
})
export class LayoutModule {

}
