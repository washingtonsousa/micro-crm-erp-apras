import { CommonModule } from "@angular/common";
import { NgModule } from "@angular/core";
import { ModalModule } from "ngx-bootstrap/modal";
import { MaterialModule } from "src/app/ui-components/material/material.module";
import { UsuarioCardComponent } from "./usuario-card/usuario-card.component";


@NgModule({
  declarations: [UsuarioCardComponent],
  exports: [UsuarioCardComponent],
  imports: [CommonModule, MaterialModule, ModalModule]
})
export class UsuarioModule {




}
