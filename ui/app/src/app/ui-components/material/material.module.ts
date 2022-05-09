import { CommonModule } from "@angular/common";
import { NgModule } from "@angular/core";
import { BrowserModule } from "@angular/platform-browser";
import { BrowserAnimationsModule } from "@angular/platform-browser/animations";
import { BsDropdownModule } from "ngx-bootstrap/dropdown";
import { CardWithIconComponent } from "./card/card-with-icon/card-with-icon.component";
import { SimpleCardComponent } from "./card/simple-card/simple-card.component";
import { EditDeleteDropDownComponent } from "./dropdowns/edit-delete-dropdown/edit-delete-dropdown.component";
import { GlobalLoadingIconComponent } from "./loading-icons/global-loading-icon/global-loading-icon.component";
import { CleanModalComponent } from "./modal/clean-modal/clean-modal.component";
import { GlobalModalComponent } from "./modal/global-modal/global-modal.component";



@NgModule({
  imports: [CommonModule, BrowserModule,   BrowserAnimationsModule,
    BsDropdownModule],
  exports: [SimpleCardComponent,EditDeleteDropDownComponent, GlobalModalComponent, GlobalLoadingIconComponent, CleanModalComponent, CardWithIconComponent],
  declarations: [SimpleCardComponent, EditDeleteDropDownComponent, GlobalModalComponent, GlobalLoadingIconComponent, CleanModalComponent, CardWithIconComponent],
  providers: []
})
export class MaterialModule {

}
