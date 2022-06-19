import { NgModule } from "@angular/core";
import { FichaStatusResolverPipe } from "./ficha-status-pipe/ficha-status-pipe.pipe";
import { PedidoStatusResolverPipe } from "./pedido-status-pipe/pedido-status-pipe.pipe";
import { ProdutoEANPipe } from "./produto-ean/produto-ean-pipe";
import { ServerDatePipe } from "./server-date-pipe/server-date-pipe.pipe";


@NgModule({

    declarations: [PedidoStatusResolverPipe,ServerDatePipe, FichaStatusResolverPipe, ProdutoEANPipe],
    exports: [PedidoStatusResolverPipe,ServerDatePipe,FichaStatusResolverPipe, ProdutoEANPipe]


})
export class PipesModule {



}
