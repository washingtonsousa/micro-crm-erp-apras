import { Component, Output } from "@angular/core";
import { FormBuilder, FormGroup, Validators } from "@angular/forms";
import { EventEmitter } from "@angular/core";
import { HttpErrorResponse } from "@angular/common/http";




@Component({
    selector: "cliente-form",
    templateUrl: "cliente-form.component.html"
})
export class ClienteFormComponent {

  clientFormGroup!: FormGroup;
  @Output("onSuccess") onSuccess: EventEmitter<any> = new  EventEmitter<any>();
  @Output("onFail") onFail: EventEmitter<any> = new  EventEmitter<any>();
  file!: File;

  constructor(private formBuilder: FormBuilder) {

  }

  onFileChange(event: any) {

    if (event.target.files.length > 0) {
      this.file  = event.target.files[0];
      this.clientFormGroup.patchValue({
        file: this.file
      });

    }
  }

  Submit() {

    if(this.clientFormGroup == null)
    return;

    const formData = new FormData();
    formData.append('imagem', this.file, "imagem-cliente");
    formData.append('nome', this.clientFormGroup?.get('nome')?.value);

    // this.loginService.Login(this.clientFormGroup.value).subscribe({

    //   next:  (data:TokenResponse) => {
    //     this.onSuccess.emit(data);
    //   },
    //   error:(data:HttpErrorResponse) => {
    //     this.onFail.emit(data);
    //     console.log(data);
    //   },

    // }


    //);
  }



  ngOnInit(): void {
    this.clientFormGroup = this.formBuilder.group({
      nome: ['', [Validators.required]],
      imagem: [null, []],

        });
  }



}
