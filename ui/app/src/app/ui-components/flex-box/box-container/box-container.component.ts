import { Component } from "@angular/core";



@Component({
  selector:"box-container",
  template: `

        <div class="floating-box">

                  <ng-content> </ng-content>

        </div>


    `
})
export class BoxContainerComponent
 {

}
