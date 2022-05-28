import { CommonModule } from "@angular/common";
import { NgModule } from "@angular/core";
import { ReactiveFormsModule } from "@angular/forms";
import { AlertModule } from "ngx-bootstrap/alert";
import { ModalModule } from "ngx-bootstrap/modal";
import { LayoutModule } from "src/app/layout/layout.module";
import { PathResolverPipesModule } from "src/app/pipes/path-resolver-pipes/path-resolver-pipes.module";
import { ClienteService } from "src/app/services/core/api/cliente-service.service";
import { FlexBoxModule } from "src/app/ui-components/flex-box/flex-box.module";
import { GeneralUIModule } from "src/app/ui-components/general/generalUI.module";
import { MaterialModule } from "src/app/ui-components/material/material.module";
import { ClienteCardComponent } from "./cliente-card/cliente-card.component";
import { ClienteFormComponent } from "./cliente-form/cliente-form.component";
import { ClienteComponent } from "./cliente.component";


@NgModule({
  providers: [ClienteService],
  declarations: [ClienteCardComponent, ClienteFormComponent, ClienteComponent],
  exports: [ClienteCardComponent, ClienteFormComponent, ClienteComponent],
  imports: [CommonModule, MaterialModule, AlertModule, MaterialModule,
     GeneralUIModule, ReactiveFormsModule,
     FlexBoxModule,
     LayoutModule, PathResolverPipesModule, ModalModule]
})
export class ClienteModule {




}
