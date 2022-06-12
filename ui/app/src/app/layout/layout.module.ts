import { CommonModule } from "@angular/common";
import { NgModule } from "@angular/core";
import { ReactiveFormsModule } from "@angular/forms";
import { BrowserModule } from "@angular/platform-browser";
import { RouterModule } from "@angular/router";
import { AlertModule } from "ngx-bootstrap/alert";
import { BsDropdownModule } from "ngx-bootstrap/dropdown";
import { DirectivesModule } from "../directives/directives.module";
import { UsuarioModule } from "../navigation/pages/usuario/usuario.module";
import { GeneralUIModule } from "../ui-components/general/generalUI.module";
import { MaterialModule } from "../ui-components/material/material.module";
import { ContainerComponent } from "./container/container.component";
import { HeaderComponent } from "./header/header.component";
import { MenuComponent } from "./menu/menu.component";
import { SideMenuComponent } from "./side-menu/side-menu.component";
import { UserMenuComponent } from "./user-menu/user-menu.component";
import { UsuarioChangeSenhaFormComponent } from "./user-menu/usuario-change-senha-form/usuario-change-senha-form.component";



@NgModule({
  imports: [RouterModule, CommonModule, DirectivesModule, ReactiveFormsModule, AlertModule, BrowserModule, GeneralUIModule, MaterialModule, BsDropdownModule],
  exports: [ContainerComponent,UserMenuComponent, UsuarioChangeSenhaFormComponent],
  declarations: [ContainerComponent, SideMenuComponent, UsuarioChangeSenhaFormComponent, UserMenuComponent, MenuComponent, HeaderComponent],
  providers: []
})
export class LayoutModule {

}
