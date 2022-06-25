import { Pipe, PipeTransform } from "@angular/core";
import { DomSanitizer } from "@angular/platform-browser";

@Pipe({
  name: 'fichaStatus'
})
export class FichaStatusResolverPipe implements PipeTransform {

    constructor(protected sanitizer: DomSanitizer) {}

    transform(status: number | null | undefined)  {

        if(status == 1)
          return "Cadastrada";
        if(status == 2)
          return "Recebido Corte / Separação";
        if(status == 3)
          return "Recebido Bordado / Estamparia";
        if(status == 4)
          return "Recebido Costura";
        if(status == 5)
          return "Finalizado";

          return "Status da ficha inconsistente ou com erro";
    }

}
