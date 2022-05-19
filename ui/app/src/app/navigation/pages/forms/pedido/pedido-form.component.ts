import { Component, OnInit } from "@angular/core";
import { FormBuilder, FormGroup } from "@angular/forms";
import { Pedido } from "src/app/business/entities/model/pedido";
import { PedidoService } from "src/app/services/core/api/pedido-service.service";
import { UpdateCreateReactiveForm } from "../abstractions/update-create-reactive-form";


@Component({
  selector: "pedido-form",
  templateUrl: "pedido-form.component.html"
})
export class PedidoFormComponent extends UpdateCreateReactiveForm<Pedido>  implements OnInit {


       pedidoFormGroup!:   FormGroup;

       constructor(public override formBuilder: FormBuilder,
        public override dataService: PedidoService)
      {
        super();
      }

      override ngOnInit(): void {
                super.ngOnInit();
      }

      initForm(): void {
       this.formGroup = this.formBuilder.group({

       });
      }


}
