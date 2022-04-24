import { Injectable } from "@angular/core";
import { CanActivate, Router } from "@angular/router";
import { ContextService } from "src/app/services/core/static/context.service";

@Injectable({
  providedIn: 'root'
})
export class AuthGuard implements CanActivate {

  constructor(private router: Router){
  }

  canActivate() : boolean {

        if(!ContextService.isLoggedIn)
              this.router.navigateByUrl("/login");

       return true;

  }
}
