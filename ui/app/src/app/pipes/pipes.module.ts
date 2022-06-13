import { NgModule } from "@angular/core";
import { PedidoStatusResolverPipe } from "./pedido-status-pipe/pedido-status-pipe.pipe";
import { ProdutoEANPipe } from "./produto-ean/produto-ean-pipe";


@NgModule({

    declarations: [PedidoStatusResolverPipe, ProdutoEANPipe],
    exports: [PedidoStatusResolverPipe, ProdutoEANPipe]


})
export class PipesModule {



}
