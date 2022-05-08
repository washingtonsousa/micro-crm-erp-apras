import { GlobalIconConfigModel } from "src/app/ui-components/material/loading-icons/global-loading-icon/global-icon.model";
import { GlobalEmitters } from "./global-emitters";

export class LoadingIconService {

      public static show(message:string = "") {
            GlobalEmitters.get("loading-icon").emit(new GlobalIconConfigModel(true,message));
      }

      public static hide(message:string = "") {
        GlobalEmitters.get("loading-icon").emit(new GlobalIconConfigModel(false,message));
      }

      public static listen() {
        return GlobalEmitters.get("loading-icon");
      }

}
