import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { AuthGuard } from './infra/interceptors/guard/auth-guard';
import { ClienteComponent } from './navigation/pages/cliente/cliente.component';
import { HomeComponent } from './navigation/pages/home/home.component';
import { LoginComponent } from './navigation/pages/login/login.component';
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

}




];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
