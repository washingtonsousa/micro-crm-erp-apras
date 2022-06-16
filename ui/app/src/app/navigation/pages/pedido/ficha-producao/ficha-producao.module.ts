import { CommonModule } from "@angular/common";
import { NgModule } from "@angular/core";
import { ReactiveFormsModule } from "@angular/forms";
import { AlertModule } from "ngx-bootstrap/alert";
import { ModalModule } from "ngx-bootstrap/modal";
import { TabsModule } from "ngx-bootstrap/tabs";
import { LayoutModule } from "src/app/layout/layout.module";
import { PathResolverPipesModule } from "src/app/pipes/path-resolver-pipes/path-resolver-pipes.module";
import { PipesModule } from "src/app/pipes/pipes.module";
import { FlexBoxModule } from "src/app/ui-components/flex-box/flex-box.module";
import { GeneralUIModule } from "src/app/ui-components/general/generalUI.module";
import { MaterialModule } from "src/app/ui-components/material/material.module";
import { FichaProducaoComponent } from "./ficha-producao.component";
import { FichaProducaoFormComponent } from "./form/ficha-producao-form.component";





@NgModule({
    providers: [],
    declarations: [FichaProducaoComponent, FichaProducaoFormComponent],
    exports: [FichaProducaoComponent, FichaProducaoFormComponent],
    imports: [ TabsModule, PipesModule, CommonModule, AlertModule,  GeneralUIModule,
      LayoutModule,  MaterialModule, ReactiveFormsModule,
      FlexBoxModule, PathResolverPipesModule, ModalModule]
})
export class FichaProducaoModule {

}