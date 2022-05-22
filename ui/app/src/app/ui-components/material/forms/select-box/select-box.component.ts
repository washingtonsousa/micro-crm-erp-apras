import { Component, Output, EventEmitter, Input, ChangeDetectorRef, OnInit, OnChanges, SimpleChanges, ElementRef, HostListener } from "@angular/core";
import { ControlValueAccessor, NG_VALUE_ACCESSOR } from "@angular/forms";
import { SelectBoxItem } from "./select-box-item.model";

@Component({
  selector: 'select-box',
  template: `

      <div *ngIf="!disabled" class=" select-box-area w-100 d-flex flex-column flex-align-center justify-content-center">

      <input autocomplete="off" (click)="onInputClick()" [(ngModel)]="filteredValue" (input)="onChangeInput($event)" type="text" class="form-control" name="selector-box" />

      <div *ngIf="filteredList.length && showList" class="suspended-drop-down floating-box">

        <div *ngFor="let item of filteredList" (onSelect)="onSelect($event); markAsTouched();" select-box-item [value]="item.value" class="suspended-item">

          {{  item.key }}

        </div>

      </div>
    </div>

  `,
  styleUrls: ['select-box.scss'],
  providers: [
    {
      provide: NG_VALUE_ACCESSOR,
      multi:true,
      useExisting: SelectBoxComponent
    }
  ]
})
export class SelectBoxComponent implements ControlValueAccessor, OnInit, OnChanges {

  @Output("onValueChanges") onValueChanges: EventEmitter<any> = new EventEmitter<any>();

  onChange = (value:any) => {};

  onTouched = () => {};

  touched = false;

  disabled = false;

  selectedItem!:any;
  filteredValue:any;


  showList: boolean = false;

  @Input("list") list: SelectBoxItem[] = [];

  filteredList: SelectBoxItem[] = [];

  constructor(private changeDetector: ChangeDetectorRef, private elRef: ElementRef) {}

  ngOnChanges(changes: SimpleChanges): void {
  }
  ngOnInit(): void {
      this.filteredList = this.list;
  }

  onInputClick() {
    this.showList = true;
  }

  @HostListener('document:click', ['$event'])
  onClickOutSide(event:MouseEvent)
  {

    if(!this.elRef.nativeElement.contains(event.target))
      {
        this.showList = false;
      }

  }

  onSelect($event:any) {

      this.markAsTouched();
      this.selectedItem = $event;
      this.filteredValue = $event;
      this.onValueChanges.emit(this.selectedItem);
      this.showList = false;
      this.writeValue(this.selectedItem);
      this.onChange(this.selectedItem);

  }

  onChangeInput($event:any){
    this.showList = true;
    this.filteredValue = $event.target.value;


    this.filteredList = this.list.filter(s => {

      console.log(s);

      return s.value.toLowerCase().includes(this.filteredValue?.toLowerCase())

      || s.key.toLowerCase().includes(this.filteredValue.toLowerCase());

    }

    );


    this.changeDetector.detectChanges();

    if(this.filteredValue == '') {
      this.onValueChanges.emit('');
    }



  }

  writeValue(obj: any): void {
    this.selectedItem = obj;
  }
  registerOnChange(onChange: any): void {
    this.onChange = onChange;

  }
  registerOnTouched(fn: any): void {

    this.onTouched = fn;

  }

  markAsTouched() {
    if (!this.touched) {
      this.onTouched();
      this.touched = true;
    }
  }

  setDisabledState(disabled: boolean) {
    this.disabled = disabled;
  }


}
