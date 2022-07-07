import { Pipe, PipeTransform } from "@angular/core";
import { DomSanitizer } from "@angular/platform-browser";
import { ServerDate } from "src/app/business/entities/server/server-date.model";
import { NivelAcessoEnum } from "src/app/business/enums/nivel-acesso.enum";

@Pipe({
  name: 'nivelAcesso'
})
export class UsuarioNivelAcessoPipe implements PipeTransform {

    constructor(protected sanitizer: DomSanitizer) {}

    transform(nivelAcesso: number | null | undefined)  {

          if(!nivelAcesso)
                return "Cadastro Inconsistente";

          if(nivelAcesso == NivelAcessoEnum.FUNCIONARIO)
              return "Funcionário";


          if(nivelAcesso == NivelAcessoEnum.ADMINISTRADOR)
            return "Administrador";


            return "Cadastro Inconsistente";


    }

}
