import { HttpErrorResponse } from "@angular/common/http";
import { Component, Input, Output, EventEmitter } from "@angular/core";
import { FormBuilder, FormGroup } from "@angular/forms";
import { DefaultDataResponse } from "src/app/business/entities/response/default-data-response";
import { ICrudService } from "src/app/services/core/api/abstractions/crud-service-";
import { LoadingIconService } from "src/app/services/core/static/loading-icon.service";

@Component({
  template:''
})
export abstract class UpdateCreateReactiveForm<T> {

  public formGroup: FormGroup = new FormGroup({});
  public  formBuilder!: FormBuilder;
  public  dataService!: ICrudService<T>
  @Output("onSuccess") onSuccess: EventEmitter<T> = new  EventEmitter<T>();
  @Output("onFail") onFail: EventEmitter<any> = new  EventEmitter<any>();
  @Input("entity") entity!:T;

  public updateMode = false;


  OnSubmit(aditionalParams: any[], onSuccess = () => {}, onFail = () => {}, onComplete = () => {}) {

    LoadingIconService.show("Aguarde um momento...");

    var observable =  this.updateMode ? this.dataService.Update(this.formGroup.value, aditionalParams ) :  this.dataService.Subscribe(this.formGroup.value);

    observable.subscribe({

      next:  (data:DefaultDataResponse<T>) => {

        onSuccess();
        this.onSuccess.emit(data.data);
      },
      error:(data:HttpErrorResponse) => {

        this.onFail.emit(data.error);
        LoadingIconService.hide();

        onFail();

      },
      complete: () => {

        this.formGroup.reset();
        LoadingIconService.hide();

        onComplete();

      }
    });

  }

  abstract initForm() : void;

  ngOnChanges() {
    this.initForm();
  }

  ngOnInit(): void {
    this.initForm();
  }
}
