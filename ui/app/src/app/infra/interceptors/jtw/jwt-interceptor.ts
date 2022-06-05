import { catchError, map, Observable, throwError } from 'rxjs';
import { HttpHandler, HttpRequest, HttpInterceptor, HttpEvent, HttpResponse, HttpErrorResponse } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { ContextService } from 'src/app/services/core/static/context.service';
import { Router } from '@angular/router';
import { NotExpr } from '@angular/compiler';

@Injectable()
export class JWTInterceptor implements HttpInterceptor {
  constructor(private router:Router) {}
  intercept(request: HttpRequest<any>, next: HttpHandler): Observable<HttpEvent<any>> {

    request = request.clone({
      setHeaders: {
             "Authorization" : "Bearer " +  ContextService.GetContext().token
      }
    });

    return next.handle(request);

  }
}
