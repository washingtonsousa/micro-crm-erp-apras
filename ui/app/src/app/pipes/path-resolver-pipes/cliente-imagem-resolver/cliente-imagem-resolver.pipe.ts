import { Pipe, PipeTransform } from "@angular/core";
import { DomSanitizer, SafeStyle } from "@angular/platform-browser";
import { ClienteImagem } from "src/app/business/entities/model/cliente-imagem";
import { Imagem } from "src/app/business/entities/model/imagem";
import * as enviroment from "src/environments/environment";

@Pipe({
  name: 'imageUrl'
})
export class ClienteImagemResolverPipe implements PipeTransform {

    constructor(protected sanitizer: DomSanitizer) {}

    transform(image: ClienteImagem[], Type: string = "none") : SafeStyle | null {

        var singleImage = image[0];

        if(singleImage == undefined)
        return null;

        if(singleImage.imagem == undefined)
        return null;

        console.log(singleImage.imagem);

        let path = enviroment.environment.apiUri + singleImage?.imagem?.absolutPath + '/' + singleImage?.imagem?.nome;
        let resource = null;

        switch (Type) {
            case ('style'):
            resource =  this.sanitizer.bypassSecurityTrustStyle(path);
            break;
            case ('none'):
                resource =  path;
                break;
            default:
            resource = this.sanitizer.bypassSecurityTrustResourceUrl(path);
            break;
        }

        return resource;

    }

}
