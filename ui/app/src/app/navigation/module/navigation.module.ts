import { CommonModule } from "@angular/common";
import { NgModule } from "@angular/core";
import { RouterModule } from "@angular/router";
import { AlertModule } from "ngx-bootstrap/alert";
import { LayoutModule } from "src/app/layout/layout.module";
import { UsuarioService } from "src/app/services/core/api/usuario-service.service";
import { FlexBoxModule } from "src/app/ui-components/flex-box/flex-box.module";
import { GeneralUIModule } from "src/app/ui-components/general/generalUI.module";
import { MaterialModule } from "src/app/ui-components/material/material.module";
import { ClienteComponent } from "../pages/cliente/cliente.component";
import { ClienteModule } from "../pages/cliente/cliente.module";
import { HomeComponent } from "../pages/home/home.component";
import { LoginComponent } from "../pages/login/login.component";
import { LoginModule } from "../pages/login/login.module";
import { PedidoModule } from "../pages/pedido/pedido.module";
import { ProdutoModule } from "../pages/produto/produto.module";
import { UsuarioComponent } from "../pages/usuario/usuario.component";
import { UsuarioModule } from "../pages/usuario/usuario.module";

@NgModule({

    providers: [UsuarioService],
    declarations: [HomeComponent],
    exports: [HomeComponent],
    imports: [
      UsuarioModule,
      ProdutoModule,
      UsuarioModule,
      ClienteModule,
      ClienteModule,
      LoginModule,
      RouterModule,
      MaterialModule,
      CommonModule,
      LayoutModule,
      PedidoModule,
      FlexBoxModule,
      AlertModule,
      GeneralUIModule
    ]

})
export class NavigationModule {

}
