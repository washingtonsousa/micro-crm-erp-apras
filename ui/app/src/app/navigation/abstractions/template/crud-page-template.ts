import { ChangeDetectorRef, Component } from "@angular/core";
import { PaginationDataRequest } from "src/app/business/entities/request/pagination-data-request";
import { DefaultDataResponse } from "src/app/business/entities/response/default-data-response";
import { PaginationReponse } from "src/app/business/entities/response/pagination-response";
import { IPaginatedCrudService } from "src/app/services/core/api/abstractions/paginated-crud-service";
import { GlobalModalService } from "src/app/services/core/static/global-modal.service";
import { LoadingIconService } from "src/app/services/core/static/loading-icon.service";

@Component({
  template: ''
})
export abstract class CrudPageTemplate<T> {


  public pageData!: PaginationReponse<T>;
  public notifications: any[] = [];
  public request:PaginationDataRequest<T> = new PaginationDataRequest<T>(1,4);
  public currentEntityForUpdate!: T;
  public dataService!: IPaginatedCrudService<T>;
  public changeDetector!: ChangeDetectorRef



  public loadForUpdate($event:number, onSuccess = () => {}) {

    LoadingIconService.show();

    this.dataService.GetById($event).subscribe({

      next: (data:DefaultDataResponse<T>) => {

        LoadingIconService.hide();
        this.currentEntityForUpdate = data.data;
        this.changeDetector.detectChanges();

        onSuccess();


      }
    })
   }

   onItemsPerPageChange(pageSize:number) {

    this.request.pageSize = pageSize;
    this.request.page = 1;

    this.loadPageData();

   }

   onFormFail($event:any) {
         this.notifications = $event?.data;
   }

   onFormSuccess($event:any, message = "Cadastrado com sucesso") {
     this.notifications = [];
     GlobalModalService.open(message);
     this.ngOnInit();
   }


   onChangeSearchTerm($event:any) {
         this.request.term = $event;
         this.loadPageData();
   }

   remove(id:number) {

     LoadingIconService.show();

     this.dataService.Remove(id).subscribe({

       next: (data:DefaultDataResponse<boolean>) => {
         this.loadPageData();
         LoadingIconService.hide();
       },
       error: (error) => {

         GlobalModalService.open("Ocorreu uma falha ao tentar deletar a entidade");
         LoadingIconService.hide();

       }

     });

   }


public loadPageData() {

    LoadingIconService.show();

    this.dataService.Get(this.request).subscribe({

      next: (data:DefaultDataResponse<PaginationReponse<T>>) => {

        this.pageData = data?.data;
        LoadingIconService.hide();

      },
      error: (error) => {

        LoadingIconService.hide();


      }

    });
   }


  ngOnInit(): void {

  this.loadPageData();

  }

}
