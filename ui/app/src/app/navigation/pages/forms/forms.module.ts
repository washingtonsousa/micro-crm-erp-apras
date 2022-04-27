import { CommonModule } from "@angular/common";
import { HttpClientModule } from "@angular/common/http";
import { NgModule } from "@angular/core";
import { ReactiveFormsModule } from "@angular/forms";
import { BrowserModule } from "@angular/platform-browser";
import { AlertModule } from "ngx-bootstrap/alert";
import { UsuarioService } from "src/app/services/core/api/usuario-service.service";
import { ClienteFormComponent } from "./cliente/cliente-form.component";
import { LoginFormComponent } from "./login/login-form.component";
import { UsuarioFormComponent } from "./usuario/usuario-form.component";



@NgModule({

  imports: [CommonModule, BrowserModule, ReactiveFormsModule, HttpClientModule, AlertModule],
  exports: [LoginFormComponent, ClienteFormComponent,UsuarioFormComponent],
  declarations: [LoginFormComponent, ClienteFormComponent,UsuarioFormComponent],
  providers: [UsuarioService]

})
export class  FormsModuleA
{}
