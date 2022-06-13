import { Component, OnInit } from "@angular/core";
import { GlobalEmitters } from "src/app/services/core/static/global-emitters";
import { LoadingIconService } from "src/app/services/core/static/loading-icon.service";
import { GlobalIconConfigModel } from "./global-icon.model";



@Component({
    selector: "global-loading-icon",
    template: `<div *ngIf="show" class="global-loading-icon-area">


      <div class="lds-ring"><div></div><div></div><div></div><div></div></div>

      <p class="white"> {{message}} </p>

      </div>`


})
export class GlobalLoadingIconComponent implements OnInit{

  show:boolean = false;
  message:string = "";

  ngOnInit(): void {

    LoadingIconService.listen().subscribe({
      next: (data: GlobalIconConfigModel) => {
            this.show = data.show;
            this.message = data.message

      }
    })


  }




}
