import { Component, Input, OnInit, Output } from "@angular/core";
import { FormBuilder, FormGroup, Validators } from "@angular/forms";
import { EventEmitter } from "@angular/core";
import { HttpErrorResponse } from "@angular/common/http";
import { DefaultDataResponse } from "src/app/business/entities/response/default-data-response";
import { UpdateCreateReactiveForm } from "../abstractions/update-create-reactive-form";
import { LoadingIconService } from "src/app/services/core/static/loading-icon.service";
import { DatePipe } from "@angular/common";
import { SafeStyle } from "@angular/platform-browser";
import * as enviroment from "src/environments/environment";
import { Produto } from "src/app/business/entities/model/produto";
import { ProdutoService } from "src/app/services/core/api/produto-service.service";
import { ProdutoImagem } from "src/app/business/entities/model/produto-imagem";




@Component({
    selector: "produto-form",
    templateUrl: "produto-form.component.html"
})
export class ProdutoFormComponent extends UpdateCreateReactiveForm<Produto> implements OnInit {


  file!: File;
  imageSelected!: string;
  imageSrc!:string ;

  constructor(public override formBuilder: FormBuilder,
    public override dataService: ProdutoService)
  {
    super();
  }

  onFileChange(event: any) {


    this.file = event.target.files[0];
    this.imageSelected = this.file.name;

        if (event.target.files && event.target.files[0]) {
          const reader = new FileReader();
          reader.onload = (e: any) => {
            this.imageSrc = e.target.result;
          };

    reader.readAsDataURL(event.target.files[0]);

  }


}

  Submit() {

    if(this.formGroup == null)
    return;

    LoadingIconService.show();

    super.OnSubmit([], (data:DefaultDataResponse<Produto>) => {

        if(this.file != undefined)
        this.dataService.UploadProdutoLogo(data.data.idProduto, this.file).subscribe({

              next:  (dataImage:DefaultDataResponse<ProdutoImagem>) => {
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

    var imagems = this.entity?.produtoImagem;

    if(imagems!= undefined)
      this.imageSrc = enviroment.environment.apiUri + imagems?.imagem?.absolutPath + "/" + imagems?.imagem?.nome;
    else {
      this.imageSrc = '';
    }
    this.formGroup = this.formBuilder.group({

      nome: [this.entity?.nome, [Validators.required]],
      codigoProduto: [this.entity?.codigoProduto, [Validators.required]]
    });

  }

  override ngOnInit(): void {
   super.ngOnInit();
  }


  override ngOnChanges() {
    console.log("onChangesProdutoForm");
    this.initForm();
    console.log("onChangesProdutoFormUpdateMode: " +  this.updateMode)


  }




}
