import { Component,  OnInit } from "@angular/core";
import { FormBuilder,  Validators } from "@angular/forms";
import { HttpErrorResponse } from "@angular/common/http";
import { Cliente } from "src/app/business/entities/model/cliente";
import { ClienteService } from "src/app/services/core/api/cliente-service.service";
import { DefaultDataResponse } from "src/app/business/entities/response/default-data-response";
import { UpdateCreateReactiveForm } from "../../forms/abstractions/update-create-reactive-form";
import { LoadingIconService } from "src/app/services/core/static/loading-icon.service";
import { ClienteImagem } from "src/app/business/entities/model/cliente-imagem";
import * as enviroment from "src/environments/environment";




@Component({
    selector: "cliente-form",
    templateUrl: "cliente-form.component.html"
})
export class ClienteFormComponent extends UpdateCreateReactiveForm<Cliente> implements OnInit {


  file!: File;
  imageSrc!:string ;

  constructor( public override formBuilder: FormBuilder, public override dataService: ClienteService) {
    super();
  }


  patchClienteLojaFlag(isLoja:boolean) {

        this.formGroup.patchValue({

          isLoja: isLoja ? 1 : 0

        });


  }


  Submit() {

    if(this.formGroup == null)
    return;

    LoadingIconService.show();

    super.OnSubmit([], (data:DefaultDataResponse<Cliente>) => {

        if(this.file != undefined)
        this.dataService.UploadClienteLogo(data.data.idCliente, this.file).subscribe({

              next:  (dataImage:DefaultDataResponse<ClienteImagem>) => {
                this.onSuccess.emit(data.data);
              },
              error: (data:HttpErrorResponse) => {
                this.onFail.emit(data.error);
              },
              complete: () => {
              }

            });

        if(this.file == undefined)
            this.onSuccess.emit(data.data);


    });
  }
  initForm(): void {

    console.log( this.entity);

    this.updateMode = this.entity?.idCliente > 0;


    var imagems = this.entity?.clienteImagem;

    if(imagems!= undefined)
      this.imageSrc = enviroment.environment.apiUri + imagems?.imagem?.absolutPath + "/" + imagems?.imagem?.nome;
    else {
      this.imageSrc = '';
    }

    this.formGroup = this.formBuilder.group({
      idCliente:[this.entity?.idCliente],
      strNome: [this.entity?.strNome, [Validators.required]],
      codigoCliente: [this.entity?.codigoCliente, [Validators.required, Validators.minLength(3), Validators.maxLength(3)]],
      isLoja: [this.entity?.isLoja == undefined ? false : this.entity.isLoja, [Validators.required, Validators.minLength(3), Validators.maxLength(3)]]

    });

  }

  override ngOnInit(): void {
   super.ngOnInit();
  }


  override ngOnChanges() {
    console.log("onChangesClienteForm");
    this.initForm();
    console.log("onChangesClienteFormUpdateMode: " +  this.updateMode)


  }




}
