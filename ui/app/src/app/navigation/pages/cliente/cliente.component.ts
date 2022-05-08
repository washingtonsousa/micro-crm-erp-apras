import { Component, Output } from "@angular/core";
import { FormBuilder, FormGroup, Validators } from "@angular/forms";
import { EventEmitter } from "@angular/core";
import { HttpErrorResponse } from "@angular/common/http";
import { Cliente } from "src/app/business/entities/model/cliente";




@Component({
    selector: "cliente",
    templateUrl: "cliente.component.html"
})
export class ClienteComponent {

   clientes!: Cliente[];


  constructor() {

  }


  ngOnInit(): void {

  }



}
