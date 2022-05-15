import { Component, Input, OnInit, Output } from "@angular/core";
import { FormBuilder, FormGroup, Validators } from "@angular/forms";
import { EventEmitter } from "@angular/core";
import { HttpErrorResponse } from "@angular/common/http";
import { Cliente } from "src/app/business/entities/model/cliente";
import { ClienteService } from "src/app/services/core/api/cliente-service.service";
import { DefaultDataResponse } from "src/app/business/entities/response/default-data-response";
import { UpdateCreateReactiveForm } from "../abstractions/update-create-reactive-form";




@Component({
    selector: "cliente-form",
    templateUrl: "cliente-form.component.html"
})
export class ClienteFormComponent extends UpdateCreateReactiveForm<Cliente> implements OnInit {


  file!: File;

  constructor(public override formBuilder: FormBuilder, public override dataService: ClienteService) {
    super();
  }

  onFileChange(event: any) {

    if (event.target.files.length > 0) {
      this.file  = event.target.files[0];
      this.formGroup.patchValue({
        file: this.file
      });

    }
  }

  Submit() {

    if(this.formGroup == null)
    return;

    const formData = new FormData();

    //formData.append('imagem', this.file, "imagem-cliente");

    formData.append('strNome', this.formGroup?.get('strNome')?.value);

    this.dataService.Subscribe(this.formGroup.value).subscribe({

       next:  (data:DefaultDataResponse<Cliente>) => {
         this.onSuccess.emit(data.data);
       },
       error:(data:HttpErrorResponse) => {
         this.onFail.emit(data);
         console.log(data);
      },

    });
  }
  initForm(): void {
    this.formGroup = this.formBuilder.group({

      strNome: ['', [Validators.required]],
      imagem: [null, []],

        });

  }

  override ngOnInit(): void {
   super.ngOnInit();
  }



}
