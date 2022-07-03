import { ServerDate } from "../server/server-date.model";
import { FichaProducao } from "./ficha-producao";
import { Usuario } from "./usuario";

export class UsuarioFichaHistorico {

 public idUsuarioFichaHistorico!:number;
 public estadoFicha!: number;
 public dtHistorico!:ServerDate;
 public fichaProducao!:FichaProducao;
 public idFichaProducao!:number;
 public idUsuario!:number;
 public usuario!:Usuario;

}
