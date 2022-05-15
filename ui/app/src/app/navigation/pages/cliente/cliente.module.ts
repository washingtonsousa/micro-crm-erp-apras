import { CommonModule } from "@angular/common";
import { NgModule } from "@angular/core";
import { ModalModule } from "ngx-bootstrap/modal";
import { MaterialModule } from "src/app/ui-components/material/material.module";
import { ClienteCardComponent } from "./cliente-card/cliente-card.component";


@NgModule({
  declarations: [ClienteCardComponent],
  exports: [ClienteCardComponent],
  imports: [CommonModule, MaterialModule, ModalModule]
})
export class ClienteModule {




}
