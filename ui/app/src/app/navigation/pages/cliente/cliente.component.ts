import { ChangeDetectorRef, Component, Output, ViewChild } from "@angular/core";
import { FormBuilder, FormGroup, Validators } from "@angular/forms";
import { EventEmitter } from "@angular/core";
import { HttpErrorResponse } from "@angular/common/http";
import { Cliente } from "src/app/business/entities/model/cliente";
import { CrudPageTemplate } from "../../abstractions/template/crud-page-template";
import { ClienteService } from "src/app/services/core/api/cliente-service.service";
import { CleanModalComponent } from "src/app/ui-components/material/modal/clean-modal/clean-modal.component";




@Component({
    selector: "cliente",
    templateUrl: "cliente.component.html"
})
export class ClienteComponent extends CrudPageTemplate<Cliente> {

  @ViewChild("modalClienteUpdate") modalClienteUpdate!: CleanModalComponent;


  constructor(public override dataService:  ClienteService,
    public override changeDetector: ChangeDetectorRef){

      super();

  }


  loadClienteForUpdate($event:number) {

    super.loadForUpdate($event, () => {

      this.modalClienteUpdate.openModal();

    });

  }

  override ngOnInit(): void {
    super.ngOnInit();
  }



}
