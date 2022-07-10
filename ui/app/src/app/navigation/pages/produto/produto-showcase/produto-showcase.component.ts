import { ChangeDetectorRef, Component,EventEmitter, Input, OnInit, Output, ViewChild } from "@angular/core";
import { FormBuilder, FormGroup } from "@angular/forms";
import { PedidoProduto } from "src/app/business/entities/model/pedido-produto";
import { Produto } from "src/app/business/entities/model/produto";
import { ProdutoPaginationDataRequest } from "src/app/business/entities/request/produto-pagination-data-request";
import { DefaultDataResponse } from "src/app/business/entities/response/default-data-response";
import { PaginationReponse } from "src/app/business/entities/response/pagination-response";
import { tamanhosSelectBoxItems } from "src/app/business/helpers/data/produto-data.helper";
import { CrudPageTemplate } from "src/app/navigation/abstractions/template/crud-page-template";
import { ProdutoService } from "src/app/services/core/api/produto-service.service";
import { LoadingIconService } from "src/app/services/core/static/loading-icon.service";
import { SelectBoxItem } from "src/app/ui-components/material/forms/select-box/select-box-item.model";


@Component({
  templateUrl: "produto-showcase.component.html",
  selector: "produto-showcase"
})
export class ProdutoShowcaseComponent extends CrudPageTemplate<Produto> implements OnInit{

  tamanhos: SelectBoxItem[] = tamanhosSelectBoxItems;
  public override request: ProdutoPaginationDataRequest = new ProdutoPaginationDataRequest();
  @Output("onChoose") onChoose: EventEmitter<PedidoProduto> = new EventEmitter<PedidoProduto>();

  constructor(public  formBuilder: FormBuilder, public override dataService:  ProdutoService,
    public override changeDetector: ChangeDetectorRef){

      super();

  }

        choose(produto: Produto, amount: string, tamanho: string
          ) {


            var pedidoProduto = new PedidoProduto();
            pedidoProduto.produto = produto;

            pedidoProduto.quantidade = parseInt(amount);
            pedidoProduto.idProduto = produto.idProduto;
            pedidoProduto.tamanho = tamanho;

            this.onChoose.emit(pedidoProduto);

        }

        onFilterCliente(codigoCliente:string) {
          this.request.codigoCliente = codigoCliente;
          this.request.page = 1;
          this.loadPageData();
        }



       override ngOnInit(): void {
            this.loadShowcase();
        }

          loadShowcase() {
            LoadingIconService.show("Aguarde...");

            this.dataService.Get(this.request)
            .subscribe((data:DefaultDataResponse<PaginationReponse<Produto>>) => {
              super.pageData = data.data;
              LoadingIconService.hide();

            });

      }

}
