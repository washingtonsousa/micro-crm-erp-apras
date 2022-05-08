import { CommonModule } from "@angular/common";
import { NgModule } from "@angular/core";
import { BrowserModule } from "@angular/platform-browser";
import { RouterModule } from "@angular/router";
import { BsDropdownModule } from "ngx-bootstrap/dropdown";
import { DirectivesModule } from "../directives/directives.module";
import { ContainerComponent } from "./container/container.component";
import { HeaderComponent } from "./header/header.component";
import { MenuComponent } from "./menu/menu.component";
import { SideMenuComponent } from "./side-menu/side-menu.component";
import { UserMenuComponent } from "./user-menu/user-menu.component";



@NgModule({
  imports: [RouterModule, CommonModule, DirectivesModule, BrowserModule, BsDropdownModule],
  exports: [ContainerComponent,UserMenuComponent],
  declarations: [ContainerComponent, SideMenuComponent, UserMenuComponent, MenuComponent, HeaderComponent],
  providers: []
})
export class LayoutModule {

}
