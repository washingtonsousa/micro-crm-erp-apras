import { NgModule } from "@angular/core";
import { FichaStatusResolverPipe } from "./ficha-status-pipe/ficha-status-pipe.pipe";
import { PedidoStatusResolverPipe } from "./pedido-status-pipe/pedido-status-pipe.pipe";
import { ProdutoEANPipe } from "./produto-ean/produto-ean-pipe";
import { ServerDatePipe } from "./server-date-pipe/server-date-pipe.pipe";
import { UsuarioNivelAcessoPipe } from "./usuario-nivel-acesso-pipe/usuario-nivel-acesso.pipe";


@NgModule({

    declarations: [UsuarioNivelAcessoPipe, PedidoStatusResolverPipe,ServerDatePipe, FichaStatusResolverPipe, ProdutoEANPipe],
    exports: [UsuarioNivelAcessoPipe, PedidoStatusResolverPipe,ServerDatePipe,FichaStatusResolverPipe, ProdutoEANPipe]


})
export class PipesModule {



}
