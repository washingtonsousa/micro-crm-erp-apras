import { Observable } from 'rxjs';
import { HttpHandler, HttpRequest, HttpInterceptor, HttpEvent } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { ContextService } from 'src/app/services/core/static/context.service';

@Injectable()
export class JWTInterceptor implements HttpInterceptor {
  constructor() {}
  intercept(request: HttpRequest<any>, next: HttpHandler): Observable<HttpEvent<any>> {

    request = request.clone({
      setHeaders: {
             "Authorization" : "Bearer " +  ContextService.GetContext().token
      }
    });
    return next.handle(request);
  }
}
