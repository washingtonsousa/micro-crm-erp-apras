import { FichaProducao } from "./ficha-producao";
import { Pedido } from "./pedido";
import { Produto } from "./produto";

export class PedidoProduto {

  idPedido!: number;
  idProduto!:number;
  pedido!: Pedido;
  produto!: Produto;
  quantidade!:number;
  tamanho!:string;
  idPedidoProduto!: number;
  fichasProducao: FichaProducao[] = [];





}
