import { environment } from "src/environments/environment";
import { Produto } from "../../entities/model/produto";

export class ProdutoExtension {

    static  getProdutoImagemSrc(produto: Produto) : string {

      if(produto?.produtoImagem == undefined)
      return '';

      var imagem = produto.produtoImagem;

      if(imagem!= undefined)
        return  environment.apiUri + imagem?.imagem?.absolutPath + "/" + imagem?.imagem?.nome;
      else {
        return '';
      }
    }

}
