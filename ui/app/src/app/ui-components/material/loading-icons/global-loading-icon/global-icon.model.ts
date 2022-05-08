export class GlobalIconConfigModel {

  show:boolean = false;
  message:string = '';

  constructor(show:boolean, message:string) {
      this.show = show;
      this.message = message;
  }

}
