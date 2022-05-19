import { CommonModule } from "@angular/common";
import { NgModule } from "@angular/core";
import { AlertModule } from "ngx-bootstrap/alert";
import { ModalModule } from "ngx-bootstrap/modal";
import { LayoutModule } from "src/app/layout/layout.module";
import { PathResolverPipesModule } from "src/app/pipes/path-resolver-pipes/path-resolver-pipes.module";
import { FlexBoxModule } from "src/app/ui-components/flex-box/flex-box.module";
import { GeneralUIModule } from "src/app/ui-components/general/generalUI.module";
import { MaterialModule } from "src/app/ui-components/material/material.module";
import { FormsModuleA } from "../forms/forms.module";
import { PedidoCardComponent } from "./pedido-card/pedido-card.component";
import { PedidoComponent } from "./pedido.component";


@NgModule({
  declarations: [PedidoCardComponent,PedidoComponent],
  exports: [PedidoCardComponent, PedidoComponent],
  imports: [CommonModule, AlertModule, GeneralUIModule,
    LayoutModule, FormsModuleA, MaterialModule,
    FlexBoxModule, PathResolverPipesModule, ModalModule]
})
export class PedidoModule {




}
