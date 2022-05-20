import { Component, Output, EventEmitter, Directive, Input, HostListener } from "@angular/core";
import { ControlValueAccessor } from "@angular/forms";

@Directive({
  selector: '[select-box-item]',
})
export class SelectBoxItemDirective  {

  @Output('onSelect') onSelect: EventEmitter<any> = new EventEmitter<any>();
  @Input("value") value!:any;

  @HostListener('click', ['$event'])
  public  onClick(event:any)
  {

      this.onSelect.emit(this.value);

  }

  @HostListener('document:keydown.enter', ['$event'])
  public  onEnter(event:KeyboardEvent)
  {

    this.onSelect.emit(this.value);

  }



}
