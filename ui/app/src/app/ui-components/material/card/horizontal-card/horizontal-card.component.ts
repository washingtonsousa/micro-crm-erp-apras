import { Component, Input, Output,EventEmitter } from "@angular/core";

@Component({
  styleUrls: ["horizontal-card.scss"],
  selector: "horizontal-card",
  template: `
  <div  class="horizontal-card d-flex box-shadow" [style]="'width: ' + width + ';' + 'border-left-color: ' + borderColor">

      <div class="card-icon">

          <i class="fa fa-info"> </i>

      </div>

      <div class="horizontal-card-body">

        <h5 *ngIf="title != null" class="card-title">{{title}}</h5>
        <ng-content> </ng-content>

      </div>

  </div>

  `,
})
export class HorizontalCardComponent {

  @Input("title") title!: string;
  @Input("width") width: string = "100%";
  @Input("borderColor") borderColor: string = "#003E81";
  @Output("edit") edit: EventEmitter<any> = new EventEmitter<any>();
  @Output("delete") delete: EventEmitter<any> = new EventEmitter<any>();

}
