import { Pipe, PipeTransform } from "@angular/core";
import { DomSanitizer } from "@angular/platform-browser";

@Pipe({
  name: 'pedidoStatus'
})
export class PedidoStatusResolverPipe implements PipeTransform {

    constructor(protected sanitizer: DomSanitizer) {}

    transform(status: number | null | undefined)  {

        if(status == 1)
          return "Criado";
        if(status == 2)
          return "Em andamento";
        if(status == 3)
          return "Finalizado";


          return "Status do pedido inconsistente ou com erro";
    }

}
