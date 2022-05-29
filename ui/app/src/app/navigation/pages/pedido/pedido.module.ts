import { CommonModule } from "@angular/common";
import { NgModule } from "@angular/core";
import { ReactiveFormsModule } from "@angular/forms";
import { AlertModule } from "ngx-bootstrap/alert";
import { ModalModule } from "ngx-bootstrap/modal";
import { LayoutModule } from "src/app/layout/layout.module";
import { PathResolverPipesModule } from "src/app/pipes/path-resolver-pipes/path-resolver-pipes.module";
import { PipesModule } from "src/app/pipes/pipes.module";
import { PedidoService } from "src/app/services/core/api/pedido-service.service";
import { ProdutoService } from "src/app/services/core/api/produto-service.service";
import { FlexBoxModule } from "src/app/ui-components/flex-box/flex-box.module";
import { GeneralUIModule } from "src/app/ui-components/general/generalUI.module";
import { MaterialModule } from "src/app/ui-components/material/material.module";
import { ProdutoModule } from "../produto/produto.module";
import { PedidoCardComponent } from "./pedido-card/pedido-card.component";
import { PedidoFormComponent } from "./pedido-form/pedido-form.component";
import { PedidoComponent } from "./pedido.component";


@NgModule({
  providers: [PedidoService, ProdutoService,],
  declarations: [PedidoCardComponent,PedidoComponent, PedidoFormComponent],
  exports: [PedidoCardComponent, PedidoFormComponent, PedidoComponent],
  imports: [PipesModule, CommonModule, AlertModule, ProdutoModule, GeneralUIModule,
    LayoutModule,  MaterialModule, ReactiveFormsModule,
    FlexBoxModule, PathResolverPipesModule, ModalModule]
})
export class PedidoModule {




}
