import { environment } from "src/environments/environment";
import { ClienteImagem } from "./cliente-imagem";

export class Produto {

  nome!: string;
  idProduto!: number;
  produtoImagem!: any;
  codigoProduto!:string;
  cor!: string;
  codigoCliente!: string;

  get ean() : string[] {
     return [];
    //this.codigoCliente + this.codigoProduto + this.tamanho;
  }


}
