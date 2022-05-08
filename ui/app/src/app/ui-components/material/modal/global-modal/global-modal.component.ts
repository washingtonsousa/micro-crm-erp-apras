import { Component, Input, OnInit, TemplateRef, ViewChild } from "@angular/core";
import { BsModalService, BsModalRef } from 'ngx-bootstrap/modal';
import { GlobalModalService } from "src/app/services/core/static/global-modal.service";
import { CleanModalComponent } from "../clean-modal/clean-modal.component";
import { GlobalModalConfig } from "./global-modal";


@Component({
  selector: "global-modal",
  template: `

      <clean-modal #modal title="Mensagem do Sistema" >

      <div [innerHtml]="content"></div>

      </clean-modal>

  `
})
export class GlobalModalComponent implements OnInit {

  @ViewChild("modal") modal!: CleanModalComponent;
  content: string = "";
  modalRef?: BsModalRef;
  constructor() {}

  ngOnInit(): void {



    GlobalModalService.listen().subscribe({

        next: (data:GlobalModalConfig) => {

              this.content = data.message;

             if(data.show)
                this.open();
                else
                this.close();



        }


      })


  }

  open() {
    this.modal.openModal();
  }

  close() {
    this.modal.closeModal();
  }

}
