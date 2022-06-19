import { ServerDate } from "../server/server-date.model";
import { PedidoProduto } from "./pedido-produto";
import { Usuario } from "./usuario";

export class FichaProducao {

  idPedidoProduto!: number;
  idFichaProducao: number = 0;
  estadoFicha: number = 0;
  qtnProducao!: number;
  dtProducao!: ServerDate;
  dtCorteSeparacao!: ServerDate;
  qtnCorteSeparacaoPerda!: number;
  qtnCorteSeparacao!: number;
  dtBordadoEstampa!: any;
  qtnBordadoEstampa!: number;
  qtnBordadoEstampaPerda!: number;
  dtCostura!: ServerDate;
  qtnCostura!: number;
  qtnCosturaPerda!: number;
  qtnProduzido!: number;
  qtnPerdido!: number;
  dtCadastro!: ServerDate;


  //Usuarios
  idUsuarioCorteSeparacao!: number;
  idUsuarioBordadoEstamparia!: number;
  idUsuarioCostura!: number;
  idUsuarioCadastroFicha!: number;

  usuarioCadastroFicha!: Usuario;


  //Pedido Herdado Associacao
  pedidoProduto!: PedidoProduto;




}
