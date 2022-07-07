import { NgModule } from "@angular/core";
import { FichaStatusResolverPipe } from "./ficha-status-pipe/ficha-status-pipe.pipe";
import { PedidoStatusResolverPipe } from "./pedido-status-pipe/pedido-status-pipe.pipe";
import { ProdutoEANPipe } from "./produto-ean/produto-ean-pipe";
import { ProdutoTamanhoPipe } from "./produto-tamanho-pipe/produto-tamanho-pipe";
import { ServerDatePipe } from "./server-date-pipe/server-date-pipe.pipe";
import { UsuarioNivelAcessoPipe } from "./usuario-nivel-acesso-pipe/usuario-nivel-acesso.pipe";


@NgModule({

    declarations: [UsuarioNivelAcessoPipe, ProdutoTamanhoPipe, PedidoStatusResolverPipe,ServerDatePipe, FichaStatusResolverPipe, ProdutoEANPipe],
    exports: [UsuarioNivelAcessoPipe, ProdutoTamanhoPipe,PedidoStatusResolverPipe,ServerDatePipe,FichaStatusResolverPipe, ProdutoEANPipe]


})
export class PipesModule {



}
