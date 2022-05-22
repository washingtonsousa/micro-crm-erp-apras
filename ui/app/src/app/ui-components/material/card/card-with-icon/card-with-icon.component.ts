import { Component, Input, Output,EventEmitter } from "@angular/core";

@Component({
  styleUrls: ["card-with-icon.scss"],
  selector: "card-with-icon",
  template: `
  <div class="card" [style]="'width: ' + width + ';'">

      <div *ngIf="!imgSrc" class="card-icon">

            <i [class]="iconClass"> </i>

      </div>

      <div *ngIf="imgSrc" class="card-img">

            <img [src]="imgSrc | sanitizerUrl"  class="img-fluid"/>

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
  @Input("imgSrc") imgSrc!:any;
  @Input("title") title!: string | undefined;
  @Input("width") width: string = "100%";

  @Output("edit") edit: EventEmitter<any> = new EventEmitter<any>();
  @Output("delete") delete: EventEmitter<any> = new EventEmitter<any>();

}
