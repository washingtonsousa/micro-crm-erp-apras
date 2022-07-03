import { CommonModule } from "@angular/common";
import { NgModule } from "@angular/core";
import { ReactiveFormsModule } from "@angular/forms";
import { RouterModule } from "@angular/router";
import { AlertModule } from "ngx-bootstrap/alert";
import { ModalModule } from "ngx-bootstrap/modal";
import { TabsModule } from "ngx-bootstrap/tabs";
import { LayoutModule } from "src/app/layout/layout.module";
import { PathResolverPipesModule } from "src/app/pipes/path-resolver-pipes/path-resolver-pipes.module";
import { PipesModule } from "src/app/pipes/pipes.module";
import { FlexBoxModule } from "src/app/ui-components/flex-box/flex-box.module";
import { GeneralUIModule } from "src/app/ui-components/general/generalUI.module";
import { MaterialModule } from "src/app/ui-components/material/material.module";
import { FichaProducaoCardComponent } from "./card/ficha-card.component";
import { FichaProducaoComponent } from "./ficha-producao.component";
import { FichaProducaoFormComponent } from "./form/ficha-producao-form.component";
import { FichaBordadoEstampariaComponent } from "./item/bordado-estamparia/ficha-bordado-estamparia.component";
import { FichaCorteSeparacaoComponent } from "./item/corte-separacao/ficha-corte-separacao.component";
import { FichaCosturaFinalizacaoComponent } from "./item/costura-finalizacao/ficha-costura-finalizacao.component";
import { FichaItemComponent } from "./item/ficha-item.component";


@NgModule({
    providers: [],
    declarations: [FichaProducaoCardComponent, FichaCosturaFinalizacaoComponent, FichaBordadoEstampariaComponent, FichaCorteSeparacaoComponent, FichaItemComponent, FichaProducaoComponent, FichaProducaoFormComponent],
    exports: [FichaProducaoComponent, FichaItemComponent, FichaProducaoFormComponent],
    imports: [ TabsModule, PipesModule, MaterialModule, PipesModule, CommonModule, AlertModule,  GeneralUIModule,
      LayoutModule,  MaterialModule,  LayoutModule, ReactiveFormsModule,
      FlexBoxModule, PathResolverPipesModule, ModalModule, RouterModule]
})
export class FichaProducaoModule {

}
