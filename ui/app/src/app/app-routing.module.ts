import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { AuthGuard } from './infra/interceptors/guard/auth-guard';
import { HomeComponent } from './navigation/pages/home/home.component';
import { LoginComponent } from './navigation/pages/login/login.component';

const routes: Routes = [

{

  path: "", component: HomeComponent, canActivate: [AuthGuard]

},


{

  path: "login", component: LoginComponent

}




];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
