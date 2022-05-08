import { Component, OnInit } from "@angular/core";
import { FormBuilder, FormGroup } from "@angular/forms";


@Component({
  selector: "pedido-form",
  templateUrl: "pedido-form.component.html"
})
export class PedidoFormComponent implements OnInit {

       pedidoFormGroup!:   FormGroup;

       constructor(private formBuilder:FormBuilder) {

       }
  ngOnInit(): void {
            this.formBuilder.group({



            });
  }


}
