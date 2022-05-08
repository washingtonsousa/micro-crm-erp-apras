import { Directive, HostListener } from "@angular/core";
import { Router } from "@angular/router";
import { Context } from "src/app/business/entities/singleton/context.model";
import { ContextService } from "src/app/services/core/static/context.service";


@Directive({
  selector: "[logout]"
})
export class LogoutDirective {

    constructor(private router: Router) {}


    @HostListener("click", ["$event"])
    Logout() {
          ContextService.logout();
          this.router.navigate(['login']);

    }

}
