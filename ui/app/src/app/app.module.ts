import { HTTP_INTERCEPTORS } from '@angular/common/http';
import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { JWTInterceptor } from './infra/interceptors/jtw/jwt-interceptor';
import { LayoutModule } from './layout/layout.module';
import { NavigationModule } from './navigation/module/navigation.module';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { AlertModule } from 'ngx-bootstrap/alert';
import { AuthGuard } from './infra/interceptors/guard/auth-guard';
import { MaterialModule } from './ui-components/material/material.module';
import { GeneralUIModule } from './ui-components/general/generalUI.module';
import { TooltipModule } from 'ngx-bootstrap/tooltip';
import { BsDropdownModule } from 'ngx-bootstrap/dropdown';
import { ModalModule } from 'ngx-bootstrap/modal';
import { ClienteService } from './services/core/api/cliente-service.service';
import { UsuarioService } from './services/core/api/usuario-service.service';

@NgModule({
  declarations: [
    AppComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    BrowserAnimationsModule,
    BsDropdownModule.forRoot(),
    ModalModule.forRoot(),
    NavigationModule,
    LayoutModule,
    BrowserAnimationsModule,
    MaterialModule,
    GeneralUIModule,
    TooltipModule.forRoot(),
    AlertModule.forRoot()
  ],
  providers: [

    ClienteService,
    UsuarioService,
    {
    provide: HTTP_INTERCEPTORS,
    useClass: JWTInterceptor,
    multi: true
   },AuthGuard],
  bootstrap: [AppComponent]
})
export class AppModule { }
