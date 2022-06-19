import { FichaProducao } from "../entities/model/ficha-producao";
import { PedidoProduto } from "../entities/model/pedido-produto";

export class PedidoProdutoAdapter {

  public pedidoProduto!: PedidoProduto;

    constructor(pedidoProduto: PedidoProduto) {
      this.pedidoProduto = pedidoProduto;
    }

    get quantidadeProduzido() {

      let qtn = 0;

      this.pedidoProduto.fichasProducao.forEach((ficha:FichaProducao) => {
          qtn += ficha.qtnProduzido ?  ficha.qtnProduzido : 0;
      })

      return qtn;
    }

    get quantidadeFichas() {

      let qtn = 0;

      this.pedidoProduto.fichasProducao.forEach((ficha:FichaProducao) => {
          qtn ++;
      })

      return qtn;
    }



}
