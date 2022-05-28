import { CommonModule } from "@angular/common";
import { HttpClientModule } from "@angular/common/http";
import { NgModule } from "@angular/core";
import { ReactiveFormsModule } from "@angular/forms";
import { AlertModule } from "ngx-bootstrap/alert";
import { ModalModule } from "ngx-bootstrap/modal";
import { LayoutModule } from "src/app/layout/layout.module";
import { UsuarioService } from "src/app/services/core/api/usuario-service.service";
import { FlexBoxModule } from "src/app/ui-components/flex-box/flex-box.module";
import { GeneralUIModule } from "src/app/ui-components/general/generalUI.module";
import { MaterialModule } from "src/app/ui-components/material/material.module";
import { UsuarioCardComponent } from "./usuario-card/usuario-card.component";
import { UsuarioFormComponent } from "./usuario-form/usuario-form.component";
import { UsuarioComponent } from "./usuario.component";


@NgModule({
  providers: [UsuarioService],
  declarations: [UsuarioCardComponent, UsuarioFormComponent, UsuarioComponent],
  exports: [UsuarioCardComponent, UsuarioComponent, UsuarioFormComponent],
  imports: [CommonModule, HttpClientModule, ReactiveFormsModule, MaterialModule, GeneralUIModule,
    LayoutModule, FlexBoxModule, AlertModule, ModalModule]
})
export class UsuarioModule {




}
