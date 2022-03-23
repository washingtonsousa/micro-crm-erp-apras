import { CommonModule } from "@angular/common";
import { NgModule } from "@angular/core";
import { HomeComponent } from "../pages/home/home.component";



@NgModule({

    providers: [],
    declarations: [HomeComponent],
    exports: [HomeComponent],
    imports: [CommonModule]

})
export class NavigationModule {

}