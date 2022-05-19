import { ChangeDetectorRef, Component, Output, ViewChild } from "@angular/core";
import { CrudPageTemplate } from "../../abstractions/template/crud-page-template";
import { CleanModalComponent } from "src/app/ui-components/material/modal/clean-modal/clean-modal.component";
import { Pedido } from "src/app/business/entities/model/pedido";
import { PedidoService } from "src/app/services/core/api/pedido-service.service";

@Component({
    selector: "pedido",
    templateUrl: "pedido.component.html"
})
export class PedidoComponent extends CrudPageTemplate<Pedido> {

  @ViewChild("modalPedidoUpdate") modalPedidoUpdate!: CleanModalComponent;


  constructor(public override dataService:  PedidoService,
    public override changeDetector: ChangeDetectorRef){

      super();

  }


  loadPedidoForUpdate($event:number) {

    super.loadForUpdate($event, () => {

      this.modalPedidoUpdate.openModal();

    });

  }

  override ngOnInit(): void {
    super.ngOnInit();
  }



}
