import { FichaProducao } from "../entities/model/ficha-producao";
import { Usuario } from "../entities/model/usuario";
import { UsuarioFichaHistorico } from "../entities/model/usuario-historico";
import { FichaProducaoEstado } from "../enums/ficha-producao-estado.enum";

export class FichaProducaoAdapter {

  public fichaProducao!: FichaProducao;

    constructor(fichaProducao: FichaProducao) {
      this.fichaProducao = fichaProducao;
    }


    get usuarioCadastroFicha() : UsuarioFichaHistorico | undefined {


            let filter = this.fichaProducao.usuarioFichaHistoricos
            .find((usuarioHistorico:UsuarioFichaHistorico) => {

                return usuarioHistorico.estadoFicha == FichaProducaoEstado.CADASTRADA;

            });

            return filter;

    }

    get usuarioRecebimentoCorte() : UsuarioFichaHistorico | undefined {


      let filter = this.fichaProducao.usuarioFichaHistoricos
      .find((usuarioHistorico:UsuarioFichaHistorico) => {

          return usuarioHistorico.estadoFicha == FichaProducaoEstado.RECEBIDO_CORTE;

      });

      return filter;

    }

      get usuarioCadastroBordado() : UsuarioFichaHistorico | undefined {


        let filter = this.fichaProducao.usuarioFichaHistoricos
        .find((usuarioHistorico:UsuarioFichaHistorico) => {

            return usuarioHistorico.estadoFicha == FichaProducaoEstado.RECEBIDO_BORDADO;

        });

      return filter;
      }

      get usuarioCadastroCostura() : UsuarioFichaHistorico | undefined {


        let filter = this.fichaProducao.usuarioFichaHistoricos
        .find((usuarioHistorico:UsuarioFichaHistorico) => {

            return usuarioHistorico.estadoFicha == FichaProducaoEstado.RECEBIDO_COSTURA;

        });

      return filter;

}




}
