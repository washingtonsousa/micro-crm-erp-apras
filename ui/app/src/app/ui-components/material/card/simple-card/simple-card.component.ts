import { Component, Input } from "@angular/core";



@Component({
  template: `
  <div class="card" [style]="'width: ' + width + ';'">
      <div class="card-body">
        <h5 *ngIf="title != null" class="card-title">{{title}}</h5>
        <ng-content> </ng-content>
      </div>
  </div>

  `,
  selector: "simple-card"
})
export class SimpleCardComponent {
    @Input("title") title!: string;
    @Input("width") width: string = "100%";
}
