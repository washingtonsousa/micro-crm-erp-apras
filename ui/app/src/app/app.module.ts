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

@NgModule({
  declarations: [
    AppComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    NavigationModule,
    LayoutModule,
    BrowserAnimationsModule,
    AlertModule.forRoot()
  ],
  providers: [{
    provide: HTTP_INTERCEPTORS,
    useClass: JWTInterceptor,
    multi: true
   },AuthGuard],
  bootstrap: [AppComponent]
})
export class AppModule { }
