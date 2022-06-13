import { Component, Input, OnInit, Output } from "@angular/core";
import { FormBuilder, FormGroup, Validators } from "@angular/forms";
import { EventEmitter } from "@angular/core";
import { HttpErrorResponse, HttpEventType } from "@angular/common/http";
import { DefaultDataResponse } from "src/app/business/entities/response/default-data-response";
import { UpdateCreateReactiveForm } from "../../forms/abstractions/update-create-reactive-form";
import { LoadingIconService } from "src/app/services/core/static/loading-icon.service";
import { DatePipe } from "@angular/common";
import { SafeStyle } from "@angular/platform-browser";
import * as enviroment from "src/environments/environment";
import { Produto } from "src/app/business/entities/model/produto";
import { ProdutoService } from "src/app/services/core/api/produto-service.service";
import { ProdutoImagem } from "src/app/business/entities/model/produto-imagem";
import { SelectBoxItem } from "src/app/ui-components/material/forms/select-box/select-box-item.model";
import { forkJoin, Observable, tap } from "rxjs";
import { tamanhosSelectBoxItems } from "src/app/business/helpers/data/produto-data.helper";
import { ProdutoExtension } from "src/app/business/helpers/data/produto-extension";
import { ClienteService } from "src/app/services/core/api/cliente-service.service";
import { PaginationDataRequest } from "src/app/business/entities/request/pagination-data-request";
import { Cliente } from "src/app/business/entities/model/cliente";
import { PaginationReponse } from "src/app/business/entities/response/pagination-response";




@Component({
    selector: "produto-form",
    templateUrl: "produto-form.component.html"
})
export class ProdutoFormComponent extends UpdateCreateReactiveForm<Produto> implements OnInit {

  file!: File;
  imageSrc!:string ;
  todosTamanhos: boolean = false;
  tamanhos: SelectBoxItem[] = tamanhosSelectBoxItems;
  currentCountPosition: number = 0;
  multipleSubscribeProgress:number = 0;
  clienteOptions: SelectBoxItem[] = [];

  get progressPercentageMessage() : string  {

    return + this.multipleSubscribeProgress + "%" + " concluído";
  }

  constructor(public override formBuilder: FormBuilder,
    public override dataService: ProdutoService, public  clienteService: ClienteService)
  {
    super();
  }

  createForkWithProgressMessage(observablesArray: any[], message = "Cadastrando os produtos em lista...") {
    return forkJoin(observablesArray.map((req: any) => {
      return req.pipe(
        tap(e => {

          this.currentCountPosition ++;

          this.multipleSubscribeProgress = this.currentCountPosition ==
          observablesArray.length ? 100 :
           Math.ceil((100 / observablesArray.length) * this.currentCountPosition);

          LoadingIconService.show(message + this.progressPercentageMessage);

        })
      );
    }));
  }

  createObservables() {

    let observablesArray = <any> [];

    this.tamanhos.forEach(element => {

      var produtoForInsert = Object.assign({}, this.formGroup.value);
      produtoForInsert.tamanho = element.value;
      observablesArray.push(
          this.dataService.Subscribe(produtoForInsert)
      );

    });

    return this.createForkWithProgressMessage(observablesArray);

  }

createObservablesFromProdutoSubscription(results: any[]) {

  let observablesArray = <any> [];

  for(let result of results)
  observablesArray.push(this.dataService.UploadProdutoLogo(result.data.idProduto, this.file));

  return this.createForkWithProgressMessage(observablesArray, "Enviando fotos dos produtos... ");

  
}

onFileChanges(file: File) {
  console.log(file);
  this.file = file;
}

onNextMultipleUpload() {

  this.currentCountPosition = 0;
  this.onSuccess.emit();
  LoadingIconService.hide();

}

onNextSubmitList(results: any) {

  this.currentCountPosition = 0;
  console.log(this.file);
  if(this.file == undefined) {

    LoadingIconService.hide();
    this.onSuccess.emit();

  }

  if(this.file != undefined)
    this.createObservablesFromProdutoSubscription(results).subscribe({
          next:  (results) => this.onNextMultipleUpload()
   });


}

 SubmitList() {

  console.log("executandoUpdateEmLista");
  this.createObservables().subscribe({

           next: (results) => this.onNextSubmitList(results),
           error: (err) => {

             LoadingIconService.hide();
             console.log(err);

           },

           complete: () => {
            this.multipleSubscribeProgress = 0;
           }
         });

        console.log("executadoUpdateEmLista");

 }

 SubmitSingleItem() {

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

  Submit() {

    if(this.formGroup == null)
    return;

    if(this.todosTamanhos)
      this.SubmitList();
      else
      this.SubmitSingleItem();

  }


  toggleTamanhoValidator(clear:boolean) {

    if(clear)
      this.formGroup.get('tamanho')?.clearValidators();
    else
      this.formGroup.get('tamanho')?.addValidators([Validators.required]);

      this.formGroup.controls['tamanho'].updateValueAndValidity();

  }

  initForm(): void {

    this.updateMode = this.entity?.idProduto > 0;

    this.imageSrc = ProdutoExtension.getProdutoImagemSrc(this.entity);

    this.formGroup = this.formBuilder.group({

      idProduto: [this.entity?.idProduto],
      nome: [this.entity?.nome, [Validators.required]],
      codigoProduto: [this.entity?.codigoProduto, [Validators.required, Validators.minLength(4), Validators.maxLength(4)]],
      tamanho:[this.entity?.tamanho,  [Validators.required]],
      cor: [this.entity?.cor, [Validators.required]],
      codigoCliente: [this.entity?.codigoCliente, [Validators.required]]

    });

  }

  override ngOnInit(): void {
   super.ngOnInit();

   this.clienteService.Get(new PaginationDataRequest<Cliente>(1,-1)).subscribe({

          next: (data:DefaultDataResponse<PaginationReponse<Cliente>>) => {

            for(let cliente of data.data.items) {
              this.clienteOptions.push(new SelectBoxItem(cliente.strNome, cliente.codigoCliente))
            }

          }

   })
  }

  override ngOnChanges() {
    this.initForm();
  }


}
