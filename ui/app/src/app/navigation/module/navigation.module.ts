import { CommonModule } from "@angular/common";
import { NgModule } from "@angular/core";
import { RouterModule } from "@angular/router";
import { AlertModule } from "ngx-bootstrap/alert";
import { LayoutModule } from "src/app/layout/layout.module";
import { FlexBoxModule } from "src/app/ui-components/flex-box/flex-box.module";
import { GeneralUIModule } from "src/app/ui-components/general/generalUI.module";
import { MaterialModule } from "src/app/ui-components/material/material.module";
import { ClienteComponent } from "../pages/cliente/cliente.component";
import { ClienteModule } from "../pages/cliente/cliente.module";
import { FormsModuleA } from "../pages/forms/forms.module";
import { HomeComponent } from "../pages/home/home.component";
import { LoginComponent } from "../pages/login/login.component";
import { PedidoModule } from "../pages/pedido/pedido.module";
import { ProdutoModule } from "../pages/produto/produto.module";
import { UsuarioComponent } from "../pages/usuario/usuario.component";
import { UsuarioModule } from "../pages/usuario/usuario.module";

@NgModule({

    providers: [],
    declarations: [HomeComponent, LoginComponent,ClienteComponent],
    exports: [HomeComponent, LoginComponent,ClienteComponent],
    imports: [UsuarioModule,
      ProdutoModule,
      UsuarioModule,
      ClienteModule,
      RouterModule,
      MaterialModule,
      CommonModule,
      LayoutModule,
      PedidoModule,
      FlexBoxModule,
      FormsModuleA,
      AlertModule,
      GeneralUIModule]

})
export class NavigationModule {

}
