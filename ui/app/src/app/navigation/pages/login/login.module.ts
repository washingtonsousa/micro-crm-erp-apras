import { CommonModule } from "@angular/common";
import { NgModule } from "@angular/core";
import { ReactiveFormsModule } from "@angular/forms";
import { AlertModule } from "ngx-bootstrap/alert";
import { ModalModule } from "ngx-bootstrap/modal";
import { LayoutModule } from "src/app/layout/layout.module";
import { PathResolverPipesModule } from "src/app/pipes/path-resolver-pipes/path-resolver-pipes.module";
import { UsuarioService } from "src/app/services/core/api/usuario-service.service";
import { FlexBoxModule } from "src/app/ui-components/flex-box/flex-box.module";
import { GeneralUIModule } from "src/app/ui-components/general/generalUI.module";
import { MaterialModule } from "src/app/ui-components/material/material.module";
import { LoginFormComponent } from "./login-form/login-form.component";
import { LoginComponent } from "./login.component";


@NgModule({
  providers:[UsuarioService],
  declarations: [LoginFormComponent, LoginComponent],
  exports: [ LoginFormComponent, LoginComponent],
  imports: [CommonModule, AlertModule, GeneralUIModule,
    LayoutModule,  MaterialModule, ReactiveFormsModule,
    FlexBoxModule, PathResolverPipesModule, ModalModule]
})
export class LoginModule {




}
