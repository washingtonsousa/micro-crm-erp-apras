import { Pipe, PipeTransform } from "@angular/core";
import { DomSanitizer } from "@angular/platform-browser";
import { Produto } from "src/app/business/entities/model/produto";

@Pipe({
  name: 'tamanho'
})
export class ProdutoTamanhoPipe implements PipeTransform {

    constructor(protected sanitizer: DomSanitizer) {}

    transform(tamanho: string | undefined)  {

        console.log(tamanho);

        if(tamanho == '42')
          return 'P';
        if(tamanho == '44')
          return 'M';
        if(tamanho == '46')
          return 'G';
          if(tamanho == '48')
          return 'GG';

        return tamanho;
    }

}
