import { PedidoProduto } from "./pedido-produto";

export class Pedido {
  idPedido!: number;
  txtObservacoes:string = '';
  idCliente!:number;
  pedidoProdutos: PedidoProduto[] = [];
}
