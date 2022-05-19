import { ChangeDetectorRef, Component, Output, ViewChild } from "@angular/core";
import { CrudPageTemplate } from "../../abstractions/template/crud-page-template";
import { CleanModalComponent } from "src/app/ui-components/material/modal/clean-modal/clean-modal.component";
import { Produto } from "src/app/business/entities/model/produto";
import { ProdutoService } from "src/app/services/core/api/produto-service.service";

@Component({
    selector: "produto",
    templateUrl: "produto.component.html"
})
export class ProdutoComponent extends CrudPageTemplate<Produto> {

  @ViewChild("modalProdutoUpdate") modalProdutoUpdate!: CleanModalComponent;


  constructor(public override dataService:  ProdutoService,
    public override changeDetector: ChangeDetectorRef){

      super();

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
