import { Component, Input, Output,EventEmitter } from "@angular/core";

@Component({
  styleUrls: ["card-with-icon.scss"],
  selector: "card-with-icon",
  template: `
  <div class="card" [style]="'width: ' + width + ';'">

      <div class="card-icon">

            <i [class]="iconClass"> </i>

      </div>

      <div class="card-body">

        <h5 *ngIf="title != null" class="card-title">{{title}}</h5>
        <ng-content> </ng-content>

      </div>

  </div>

  `,
})
export class CardWithIconComponent {

  @Input("iconClass") iconClass: string = "fas fa-info";
  @Input("title") title!: string;
  @Input("width") width: string = "100%";

  @Output("edit") edit: EventEmitter<any> = new EventEmitter<any>();
  @Output("delete") delete: EventEmitter<any> = new EventEmitter<any>();

}
