import { AfterViewInit, ChangeDetectorRef, Component, Input, OnChanges, Output, QueryList, SimpleChanges, ViewChild, ViewChildren } from "@angular/core";
import { CrudPageTemplate } from "../../abstractions/template/crud-page-template";
import { CleanModalComponent } from "src/app/ui-components/material/modal/clean-modal/clean-modal.component";
import { Produto } from "src/app/business/entities/model/produto";
import { ProdutoService } from "src/app/services/core/api/produto-service.service";
import { SelectBoxItem } from "src/app/ui-components/material/forms/select-box/select-box-item.model";
import { tamanhosSelectBoxItems } from "src/app/business/helpers/data/produto-data.helper";
import { ProdutoPaginationDataRequest } from "src/app/business/entities/request/produto-pagination-data-request";
import { ProdutoCardComponent } from "./produto-card/produto-card.component";
import { forkJoin, tap } from "rxjs";
import { LoadingIconService } from "src/app/services/core/static/loading-icon.service";
import { GlobalModalService } from "src/app/services/core/static/global-modal.service";

@Component({
    selector: "produto",
    templateUrl: "produto.component.html"
})
export class ProdutoComponent extends CrudPageTemplate<Produto> implements OnChanges, AfterViewInit {

  @ViewChild("modalProdutoUpdate") modalProdutoUpdate!: CleanModalComponent;
  tamanhos: SelectBoxItem[] = tamanhosSelectBoxItems;
  public override request: ProdutoPaginationDataRequest = new ProdutoPaginationDataRequest();
  @Input("checked") checked: boolean = false;

  @ViewChildren("produtoCard") produtoCards: QueryList<ProdutoCardComponent> = new QueryList<ProdutoCardComponent>();

  produtosSelected: Produto[] = [];

  constructor(public override dataService:  ProdutoService,
    public override changeDetector: ChangeDetectorRef){

      super();

  }


  onDeleteSelectedCheck(value:any) {

    if(value != -1 && value != "-1")
      return;

    let observablesArray = <any> [];

    for(let produto of this.produtosSelected)
    observablesArray.push(this.dataService.Remove(produto.idProduto));

   let macroObservable =  forkJoin(observablesArray.map((req: any) => {
      return req.pipe(
        tap(e => {
          console.log(req);

        })
      );
    }));

    LoadingIconService.show("Deletando selecionados...");

    macroObservable.subscribe({

      next: (data) => {

        LoadingIconService.hide();
        this.loadPageData();
        GlobalModalService.open("Ítens selecionados deletados com sucesso");
        this.checked = false;
      },

      error: (data) => {
        LoadingIconService.hide();
         console.log(data);


      }

    })

  }

  onCheckSingle(produtoFromEmitter:Produto) {

    let idProduto = produtoFromEmitter.idProduto;

    console.log(produtoFromEmitter);

    let produto = <Produto> this.produtosSelected.find((produto:Produto) => {
        return produto.idProduto == idProduto;
    });

    if(produto) {

          let index = this.produtosSelected.indexOf(produto);

          this.produtosSelected.splice(index, 1);

    }
    else
    this.produtosSelected.push(produtoFromEmitter);

  }

  checkControl($event: any) {

    this.checked =  this.checked ? false : true;
    this.produtoCards.forEach((produtoCard:ProdutoCardComponent) => {

          produtoCard.checkCard();

          if(this.checked)
            this.produtosSelected.push(produtoCard.produto);
          else
          this.produtosSelected = [];

    });

  }


  onFilterCliente(codigoCliente:string) {
    this.request.codigoCliente = codigoCliente;
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

  ngAfterViewInit() {
    console.log(this.produtoCards);
    this.produtoCards.changes.subscribe((data) => {
      this.produtosSelected = [];
      this.checked = false;
    })
  }


  ngOnChanges(changes: SimpleChanges): void {
    console.log(this.produtoCards);
  }


}
