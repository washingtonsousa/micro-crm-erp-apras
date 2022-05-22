import { ChangeDetectorRef, Component, Output, ViewChild } from "@angular/core";
import { CrudPageTemplate } from "../../abstractions/template/crud-page-template";
import { CleanModalComponent } from "src/app/ui-components/material/modal/clean-modal/clean-modal.component";
import { Produto } from "src/app/business/entities/model/produto";
import { ProdutoService } from "src/app/services/core/api/produto-service.service";
import { SelectBoxItem } from "src/app/ui-components/material/forms/select-box/select-box-item.model";
import { tamanhosSelectBoxItems } from "src/app/business/helpers/data/produto-data.helper";
import { ProdutoPaginationDataRequest } from "src/app/business/entities/request/produto-pagination-data-request";

@Component({
    selector: "produto",
    templateUrl: "produto.component.html"
})
export class ProdutoComponent extends CrudPageTemplate<Produto> {

  @ViewChild("modalProdutoUpdate") modalProdutoUpdate!: CleanModalComponent;
  tamanhos: SelectBoxItem[] = tamanhosSelectBoxItems;
  public override request: ProdutoPaginationDataRequest = new ProdutoPaginationDataRequest();

  constructor(public override dataService:  ProdutoService,
    public override changeDetector: ChangeDetectorRef){

      super();

  }

  onFilterTamanho(newTamanho:string) {
    this.request.tamanho = newTamanho;
    this.request.page = 1;
    this.loadPageData();
  }

  loadProdutoForUpdate($event:number) {

    super.loadForUpdate($event, () => {

      this.modalProdutoUpdate.openModal();

    });

  }

  override ngOnInit(): void {
    super.ngOnInit();
  }



}
