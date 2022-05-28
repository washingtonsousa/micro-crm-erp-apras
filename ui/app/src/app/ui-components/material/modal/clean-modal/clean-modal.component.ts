import { Component, Input, TemplateRef, ViewChild } from "@angular/core";
import { BsModalService, BsModalRef } from 'ngx-bootstrap/modal';


@Component({
  selector: "clean-modal",
  templateUrl: "clean-modal.component.html"
})
export class CleanModalComponent {

 @Input("title") title!:string;

  @ViewChild("template") modalTemplate!: TemplateRef<any>;

  modalRef?: BsModalRef;
  constructor(private modalService: BsModalService) {}

  openModal() {
    this.modalRef = this.modalService.show(this.modalTemplate, { class: 'modal-lg' });
  }

  closeModal() {
    this.modalRef?.hide();
  }
}
