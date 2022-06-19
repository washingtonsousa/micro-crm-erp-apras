import { CommonModule } from "@angular/common";
import { NgModule } from "@angular/core";
import { ReactiveFormsModule } from "@angular/forms";
import { RouterModule } from "@angular/router";
import { AlertModule } from "ngx-bootstrap/alert";
import { ModalModule } from "ngx-bootstrap/modal";
import { TabsModule } from "ngx-bootstrap/tabs";
import { LayoutModule } from "src/app/layout/layout.module";
import { PathResolverPipesModule } from "src/app/pipes/path-resolver-pipes/path-resolver-pipes.module";
import { PipesModule } from "src/app/pipes/pipes.module";
import { FichaProducaoService } from "src/app/services/core/api/ficha-producao.service";
import { PedidoService } from "src/app/services/core/api/pedido-service.service";
import { ProdutoService } from "src/app/services/core/api/produto-service.service";
import { FlexBoxModule } from "src/app/ui-components/flex-box/flex-box.module";
import { GeneralUIModule } from "src/app/ui-components/general/generalUI.module";
import { MaterialModule } from "src/app/ui-components/material/material.module";
import { ProdutoModule } from "../produto/produto.module";
import { FichaProducaoModule } from "./ficha-producao/ficha-producao.module";
import { PedidoCardComponent } from "./pedido-card/pedido-card.component";
import { PedidoFormComponent } from "./pedido-form/pedido-form.component";
import { PedidoItemComponent } from "./pedido-item/pedido-item.component";
import { FichasPedidoProdutoTableComponent } from "./pedido-item/tabs/fichas-pedido-produto-table/fichas-pedido-produto-table.component";
import { PedidoProdutoTabComponent } from "./pedido-item/tabs/pedido-produto-tab.component";
import { PedidoComponent } from "./pedido.component";


@NgModule({
  providers: [PedidoService, ProdutoService, FichaProducaoService],
  declarations: [PedidoProdutoTabComponent, FichasPedidoProdutoTableComponent, PedidoCardComponent,PedidoComponent, PedidoItemComponent, PedidoFormComponent],
  exports: [PedidoCardComponent,  PedidoFormComponent, PedidoItemComponent, PedidoComponent],
  imports: [ TabsModule, PipesModule, CommonModule, AlertModule, ProdutoModule, GeneralUIModule,
    LayoutModule, FichaProducaoModule,  MaterialModule, ReactiveFormsModule,
    FlexBoxModule, PathResolverPipesModule, RouterModule, ModalModule]
})
export class PedidoModule {




}
