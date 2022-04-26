import { CommonModule } from "@angular/common";
import { NgModule } from "@angular/core";
import { AlertModule } from "ngx-bootstrap/alert";
import { LayoutModule } from "src/app/layout/layout.module";
import { FlexBoxModule } from "src/app/ui-components/flex-box/flex-box.module";
import { GeneralUIModule } from "src/app/ui-components/general/generalUI.module";
import { ClienteComponent } from "../pages/cliente/cliente.component";
import { FormsModuleA } from "../pages/forms/forms.module";
import { HomeComponent } from "../pages/home/home.component";
import { LoginComponent } from "../pages/login/login.component";



@NgModule({

    providers: [],
    declarations: [HomeComponent, LoginComponent,ClienteComponent],
    exports: [HomeComponent, LoginComponent,ClienteComponent],
    imports: [CommonModule,LayoutModule,FlexBoxModule,FormsModuleA, AlertModule, GeneralUIModule]

})
export class NavigationModule {

}
