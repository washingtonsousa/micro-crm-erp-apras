import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { AuthGuard } from './infra/interceptors/guard/auth-guard';
import { LayoutModule } from './layout/layout.module';
import { ClienteComponent } from './navigation/pages/cliente/cliente.component';
import { HomeComponent } from './navigation/pages/home/home.component';
import { LoginComponent } from './navigation/pages/login/login.component';
import { FichaProducaoComponent } from './navigation/pages/pedido/ficha-producao/ficha-producao.component';
import { FichaItemComponent } from './navigation/pages/pedido/ficha-producao/item/ficha-item.component';
import { PedidoItemComponent } from './navigation/pages/pedido/pedido-item/pedido-item.component';
import { PedidoComponent } from './navigation/pages/pedido/pedido.component';
import { ProdutoComponent } from './navigation/pages/produto/produto.component';
import { UsuarioComponent } from './navigation/pages/usuario/usuario.component';

const routes: Routes = [

{

  path: "", component: HomeComponent, canActivate: [AuthGuard]

},


{

  path: "login", component: LoginComponent

},

{

  path: "cliente", component: ClienteComponent, canActivate: [AuthGuard]

},

{

  path: "usuario", component: UsuarioComponent, canActivate: [AuthGuard]

},

{

  path: "produto", component: ProdutoComponent, canActivate: [AuthGuard]

},

{

  path: "pedido", component: PedidoComponent, canActivate: [AuthGuard]

},

{

  path: "ficha-producao", component: FichaProducaoComponent, canActivate: [AuthGuard]

},

{

  path: "ficha-producao/:id", component: FichaItemComponent, canActivate: [AuthGuard]

},

{

  path: "pedido/:id", component: PedidoItemComponent, canActivate: [AuthGuard]

}


];

@NgModule({
  imports: [RouterModule.forRoot(routes), LayoutModule],
  exports: [RouterModule]
})
export class AppRoutingModule { }
