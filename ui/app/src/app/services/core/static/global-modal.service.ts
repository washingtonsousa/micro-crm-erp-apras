import { GlobalModalConfig } from "src/app/ui-components/material/modal/global-modal/global-modal";
import { GlobalEmitters } from "./global-emitters";

export class GlobalModalService {


  public static open(message:string = "") {
    GlobalEmitters.get("global-modal").emit(new GlobalModalConfig(true, message));
  }

    public static close(message:string = "") {
        GlobalEmitters.get("global-modal").emit(new GlobalModalConfig(false, message));
    }

    public static listen() {
    return GlobalEmitters.get("global-modal");
    }


}
