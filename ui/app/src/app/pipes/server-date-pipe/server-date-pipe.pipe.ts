import { Pipe, PipeTransform } from "@angular/core";
import { DomSanitizer } from "@angular/platform-browser";
import { ServerDate } from "src/app/business/entities/server/server-date.model";

@Pipe({
  name: 'serverDateFormat'
})
export class ServerDatePipe implements PipeTransform {

    constructor(protected sanitizer: DomSanitizer) {}

    transform(serverDate: ServerDate | null | undefined)  {

          if(!serverDate)
                return "";

            let split = serverDate?.date.split(" ");
            let hourFromServerDate = split[1];
            let dateFromServerDate = split[0];


          let year =   dateFromServerDate.substring(0, 4);
          let month =   dateFromServerDate.substring(5, 7);
          let day =   dateFromServerDate.substring(8, 10);


          return day + "/" + month + "/" + year + " " + hourFromServerDate;


    }

}
