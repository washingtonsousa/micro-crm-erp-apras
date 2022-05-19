import { CommonModule } from "@angular/common";
import { NgModule } from "@angular/core";
import { AlertModule } from "ngx-bootstrap/alert";
import { ModalModule } from "ngx-bootstrap/modal";
import { LayoutModule } from "src/app/layout/layout.module";
import { FlexBoxModule } from "src/app/ui-components/flex-box/flex-box.module";
import { GeneralUIModule } from "src/app/ui-components/general/generalUI.module";
import { MaterialModule } from "src/app/ui-components/material/material.module";
import { FormsModuleA } from "../forms/forms.module";
import { UsuarioCardComponent } from "./usuario-card/usuario-card.component";
import { UsuarioComponent } from "./usuario.component";


@NgModule({
  declarations: [UsuarioCardComponent,  UsuarioComponent],
  exports: [UsuarioCardComponent, UsuarioComponent],
  imports: [CommonModule, MaterialModule, GeneralUIModule, LayoutModule, FlexBoxModule, FormsModuleA, AlertModule, ModalModule]
})
export class UsuarioModule {




}
