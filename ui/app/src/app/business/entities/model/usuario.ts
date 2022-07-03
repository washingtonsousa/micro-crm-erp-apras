import { ServerDate } from "../server/server-date.model";

export class Usuario {
      idUsuario:number = 0;
      nome: string = "";
      email:string = "";
      documento:string = "";
      nivelAcesso: number = 1;

      dataCriacao!: ServerDate;
      dataAtualizacao!: ServerDate;

}
