export class GlobalModalConfig {

  show:boolean = false;
  message:string = '';

  constructor(show:boolean, message:string) {
      this.show = show;
      this.message = message;
  }
}
