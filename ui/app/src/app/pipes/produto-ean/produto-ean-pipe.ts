import { Pipe, PipeTransform } from "@angular/core";
import { DomSanitizer } from "@angular/platform-browser";
import { Produto } from "src/app/business/entities/model/produto";

@Pipe({
  name: 'ean'
})
export class ProdutoEANPipe implements PipeTransform {

    constructor(protected sanitizer: DomSanitizer) {}

    transform(produto: Produto )  {
        return produto?.codigoCliente + produto?.codigoProduto + produto?.tamanho;
    }

}
