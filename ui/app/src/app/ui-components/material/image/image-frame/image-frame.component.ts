import { Component, Input } from "@angular/core";

@Component({

  selector: 'image-frame',
  styleUrls: ['image-frame.component.scss'],
  template: `
    <div class='img-frame w-100'>

    <span *ngIf="!imgUri" class='w-100 img-fluid d-flex  img-frame-default'>

        <i class="fas fa-image"> </i>

        <p> Inserir imagem </p>

    </span>


      <img *ngIf="imgUri" class='w-100 img-fluid' [src]="  imgUri | sanitizerUrl" />

    </div>

  `
})
export class ImageFrameComponent {
  @Input('imgUri') imgUri!: string | null;


}
