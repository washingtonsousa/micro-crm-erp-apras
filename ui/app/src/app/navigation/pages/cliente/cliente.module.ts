import { CommonModule } from "@angular/common";
import { NgModule } from "@angular/core";
import { ModalModule } from "ngx-bootstrap/modal";
import { PathResolverPipesModule } from "src/app/pipes/path-resolver-pipes/path-resolver-pipes.module";
import { MaterialModule } from "src/app/ui-components/material/material.module";
import { ClienteCardComponent } from "./cliente-card/cliente-card.component";


@NgModule({
  declarations: [ClienteCardComponent],
  exports: [ClienteCardComponent],
  imports: [CommonModule, MaterialModule, PathResolverPipesModule, ModalModule]
})
export class ClienteModule {




}
