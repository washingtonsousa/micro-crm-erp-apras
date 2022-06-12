import { JWTData } from "../model/jwt-data";
import  jwt_decode from "jwt-decode";



export class Context {

     public token!: string;

     constructor(token:string) {
       this.token = token;
     }



     public jwtData(): JWTData | null {

      try {
        return jwt_decode(this.token);

      } catch(Error) {

        return null;

      }

    }


}
