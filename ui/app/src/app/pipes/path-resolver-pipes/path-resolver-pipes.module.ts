import { NgModule } from "@angular/core";
import { SanitizerUrlPipe } from "../sanitizers/sanitizer-url.pipe";
import { ClienteImagemResolverPipe } from "./cliente-imagem-resolver/cliente-imagem-resolver.pipe";


@NgModule({

    declarations: [ClienteImagemResolverPipe, SanitizerUrlPipe],
    exports: [ClienteImagemResolverPipe,SanitizerUrlPipe]


})
export class PathResolverPipesModule {



}
