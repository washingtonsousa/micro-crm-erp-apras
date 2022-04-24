import { CommonModule } from "@angular/common";
import { NgModule } from "@angular/core";
import { AlertModule } from "ngx-bootstrap/alert";
import { LayoutModule } from "src/app/layout/layout.module";
import { FlexBoxModule } from "src/app/ui-components/flex-box/flex-box.module";
import { FormsModuleA } from "../pages/forms/forms.module";
import { HomeComponent } from "../pages/home/home.component";
import { LoginComponent } from "../pages/login/login.component";



@NgModule({

    providers: [],
    declarations: [HomeComponent, LoginComponent],
    exports: [HomeComponent, LoginComponent],
    imports: [CommonModule,LayoutModule,FlexBoxModule,FormsModuleA, AlertModule]

})
export class NavigationModule {

}
