import { NgModule } from "@angular/core";
import { PedidoStatusResolverPipe } from "./pedido-status-pipe/pedido-status-pipe.pipe";


@NgModule({

    declarations: [PedidoStatusResolverPipe],
    exports: [PedidoStatusResolverPipe]


})
export class PipesModule {



}
