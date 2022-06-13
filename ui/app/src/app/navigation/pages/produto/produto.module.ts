import { CommonModule } from "@angular/common";
import { NgModule } from "@angular/core";
import { ReactiveFormsModule } from "@angular/forms";
import { AlertModule } from "ngx-bootstrap/alert";
import { ModalModule } from "ngx-bootstrap/modal";
import { LayoutModule } from "src/app/layout/layout.module";
import { PathResolverPipesModule } from "src/app/pipes/path-resolver-pipes/path-resolver-pipes.module";
import { PipesModule } from "src/app/pipes/pipes.module";
import { FlexBoxModule } from "src/app/ui-components/flex-box/flex-box.module";
import { GeneralUIModule } from "src/app/ui-components/general/generalUI.module";
import { MaterialModule } from "src/app/ui-components/material/material.module";
import { ProdutoCardComponent } from "./produto-card/produto-card.component";
import { ProdutoFormComponent } from "./produto-form/produto-form.component";
import { ProdutoShowcaseComponent } from "./produto-showcase/produto-showcase.component";
import { ProdutoComponent } from "./produto.component";


@NgModule({
  declarations: [ProdutoCardComponent,ProdutoComponent, ProdutoShowcaseComponent, ProdutoFormComponent],
  exports: [ProdutoCardComponent, ProdutoShowcaseComponent, ProdutoComponent, ProdutoFormComponent],
  imports: [CommonModule, AlertModule, GeneralUIModule,
    LayoutModule,  MaterialModule, ReactiveFormsModule,
    FlexBoxModule, PathResolverPipesModule, PipesModule, ModalModule]
})
export class ProdutoModule {




}
