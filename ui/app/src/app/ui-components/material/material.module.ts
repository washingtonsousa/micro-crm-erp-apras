import { CommonModule } from "@angular/common";
import { NgModule } from "@angular/core";
import { BrowserModule } from "@angular/platform-browser";
import { BrowserAnimationsModule } from "@angular/platform-browser/animations";
import { BsDropdownModule } from "ngx-bootstrap/dropdown";
import { PathResolverPipesModule } from "src/app/pipes/path-resolver-pipes/path-resolver-pipes.module";
import { SwitchButtonComponent } from "./buttons/switch-btn/switch-btn.component";
import { CardWithIconComponent } from "./card/card-with-icon/card-with-icon.component";
import { HorizontalCardComponent } from "./card/horizontal-card/horizontal-card.component";
import { SimpleCardComponent } from "./card/simple-card/simple-card.component";
import { EditDeleteDropDownComponent } from "./dropdowns/edit-delete-dropdown/edit-delete-dropdown.component";
import { ImageFrameComponent } from "./image/image-frame/image-frame.component";
import { GlobalLoadingIconComponent } from "./loading-icons/global-loading-icon/global-loading-icon.component";
import { CleanModalComponent } from "./modal/clean-modal/clean-modal.component";
import { GlobalModalComponent } from "./modal/global-modal/global-modal.component";



@NgModule({
  imports: [PathResolverPipesModule, CommonModule, BrowserModule,   BrowserAnimationsModule,
    BsDropdownModule],
  exports: [SimpleCardComponent, ImageFrameComponent, HorizontalCardComponent, SwitchButtonComponent, EditDeleteDropDownComponent, GlobalModalComponent, GlobalLoadingIconComponent, CleanModalComponent, CardWithIconComponent],
  declarations: [SimpleCardComponent, ImageFrameComponent, HorizontalCardComponent, SwitchButtonComponent, EditDeleteDropDownComponent, GlobalModalComponent, GlobalLoadingIconComponent, CleanModalComponent, CardWithIconComponent],
  providers: []
})
export class MaterialModule {

}
