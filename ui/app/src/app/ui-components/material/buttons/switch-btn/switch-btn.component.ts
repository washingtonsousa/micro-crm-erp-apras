import { Component, Output,EventEmitter, Input } from "@angular/core";



@Component({
  selector: "switch-btn",
  template: `


      <!-- Rounded switch -->
      <label class="switch">
        <input type="checkbox" [checked]="checked" (change)="checkValue($event)">
        <span class="slider round"></span>
      </label>

  `,
  styleUrls: ["switch-btn.component.scss"]
})
export class SwitchButtonComponent {

  @Output("onCheck") checkControl: EventEmitter<boolean> = new EventEmitter<boolean>();
  @Input("checked") checked = false;


  checkValue($event:any) {
        console.log($event);
        this.checkControl.emit($event.target.checked);
  }
}
