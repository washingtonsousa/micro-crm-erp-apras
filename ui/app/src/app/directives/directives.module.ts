import { CommonModule } from "@angular/common";
import { NgModule } from "@angular/core";
import { RouterModule } from "@angular/router";
import { LogoutDirective } from "./actions/logout.directive";


@NgModule({
  imports: [RouterModule, CommonModule],
  exports: [LogoutDirective],
  declarations: [LogoutDirective]
})
export class DirectivesModule {

}
