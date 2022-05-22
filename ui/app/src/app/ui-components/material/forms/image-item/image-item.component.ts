import { Component, Output, EventEmitter, Input, ChangeDetectorRef, OnInit, OnChanges, SimpleChanges, ElementRef, HostListener } from "@angular/core";

@Component({
  selector: 'image-item',
  template: `

<image-frame (click)="fileInput.click()" class="my-2 d-block pointer" [imgUri]="imageSrc">

</image-frame>

<input #fileInput accept="image/png, image/gif, image/jpeg" type="file" class="d-none"  (change)="onFileChange($event)"  />


  `,
  styleUrls: ['image-item.scss']

})
export class ImageItemComponent implements  OnInit, OnChanges {

  @Output("onValueChanges") onValueChanges: EventEmitter<any> = new EventEmitter<any>();

  file!:File;
  @Input("imageSrc") imageSrc:any;

  constructor(private changeDetector: ChangeDetectorRef, private elRef: ElementRef) {}

  onFileChange(event:any) {

  this.file = event.target.files[0];

      if (event.target.files && event.target.files[0]) {
        const reader = new FileReader();
        reader.onload = (e: any) => {
          this.imageSrc = e.target.result;
        };

    reader.readAsDataURL(event.target.files[0]);

    }

    this.onValueChanges.emit(this.file);

  }

  ngOnChanges(changes: SimpleChanges): void {
  }
  ngOnInit(): void {
  }


}
