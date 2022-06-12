import { catchError, map, Observable, throwError } from 'rxjs';
import { HttpHandler, HttpRequest, HttpInterceptor, HttpEvent, HttpResponse, HttpErrorResponse } from '@angular/common/http';
import { ErrorHandler, Injectable } from '@angular/core';
import { ContextService } from 'src/app/services/core/static/context.service';
import { Router } from '@angular/router';
import { LoadingIconService } from 'src/app/services/core/static/loading-icon.service';
import { GlobalEmitters } from 'src/app/services/core/static/global-emitters';

@Injectable()
export class ErrorInterceptor implements ErrorHandler {
  constructor(private router:Router) {}

  handleError(error: any): void {


    console.log('GlobalErrorHandlerService')
    console.error(error);

        console.log("onErrorIntercept");

        if (error instanceof HttpErrorResponse)
        {

              if(error.status == 401) {
               // console.log(event.status);
               // this.router.navigate(['/login']);                
                GlobalEmitters.get("login-window").emit(true);
                LoadingIconService.hide();

              }
          }



  }


}
