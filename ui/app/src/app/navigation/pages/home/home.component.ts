import { Component, OnInit } from "@angular/core";
import { ContextService } from "src/app/services/core/static/context.service";



@Component({
    selector: "home",
    templateUrl: "home.component.html",
    styleUrls: ['home.scss']
})
export class HomeComponent implements OnInit{
    ngOnInit(): void {
        this.nomeUsuario =  ContextService.getCurrentLoggedInUserName();
    }

    nomeUsuario:string |undefined | null= "";




}
