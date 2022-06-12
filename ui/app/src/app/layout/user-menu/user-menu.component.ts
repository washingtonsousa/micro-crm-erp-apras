import { Component } from "@angular/core";
import { ContextService } from "src/app/services/core/static/context.service";

@Component({

selector: "user-menu",
templateUrl: "user-menu.component.html",
styleUrls: ["user-menu.scss"]

})
export class UserMenuComponent {


      get userName() : string | undefined | null {
        return ContextService.getCurrentLoggedInUserName();
      }

}
