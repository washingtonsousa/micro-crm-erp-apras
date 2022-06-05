import { catchError, map, Observable, throwError } from 'rxjs';
import { HttpHandler, HttpRequest, HttpInterceptor, HttpEvent, HttpResponse, HttpErrorResponse } from '@angular/common/http';
import { ErrorHandler, Injectable } from '@angular/core';
import { ContextService } from 'src/app/services/core/static/context.service';
import { Router } from '@angular/router';

@Injectable()
export class ErrorInterceptor implements ErrorHandler {
  constructor(private router:Router) {}

  handleError(error: any): void {


    console.log('GlobalErrorHandlerService')
    console.error(error);

        console.log("onErrorIntercept");

        if (error instanceof HttpErrorResponse)
        {

        //  console.log(event.status);
              if(error.status == 401) {
               // console.log(event.status);
                this.router.navigate(['/login']);
              }
          }



  }


}
