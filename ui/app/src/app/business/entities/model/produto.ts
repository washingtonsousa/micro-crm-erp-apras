import { environment } from "src/environments/environment";
import { ClienteImagem } from "./cliente-imagem";

export class Produto {

  nome!: string;
  idProduto!: number;
  produtoImagem!: any;
  codigoProduto!:string;
  tamanho!: string;
  cor!: string;


  public getProdutoImagemSrc() : string {

    var imagem = this.produtoImagem;

    console.log(this.produtoImagem);

    if(imagem!= undefined)
      return  environment.apiUri + imagem?.imagem?.absolutPath + "/" + imagem?.imagem?.nome;
    else {
      return '';
    }
  }

}
