import { HttpErrorResponse } from "@angular/common/http";
import { Component, Input, Output, EventEmitter } from "@angular/core";
import { FormBuilder, FormGroup } from "@angular/forms";
import { Observable } from "rxjs";
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

  protected defaultObservable!: Observable<DefaultDataResponse<T>>;

  OnSubmit(aditionalParams: any[], onSuccess = (data:any) => {

    this.onSuccess.emit(data.data);
    LoadingIconService.hide();


  }, onFail = (data:any) => {
        this.onFail.emit(data.error);
        LoadingIconService.hide();
  }, onComplete = () => {}) {

    LoadingIconService.show("Aguarde um momento...");

    this.defaultObservable =  this.updateMode ? this.dataService.Update(this.formGroup.value, aditionalParams ) :  this.dataService.Subscribe(this.formGroup.value);

    this.defaultObservable.pipe(

    ).subscribe({

      next:  (data:DefaultDataResponse<T>) => {

        onSuccess(data);
      },
      error:(data:HttpErrorResponse) => {

        onFail(data);

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
