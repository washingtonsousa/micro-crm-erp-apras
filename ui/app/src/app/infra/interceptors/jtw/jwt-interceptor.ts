import { map, Observable } from 'rxjs';
import { HttpHandler, HttpRequest, HttpInterceptor, HttpEvent, HttpResponse, HttpErrorResponse } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { ContextService } from 'src/app/services/core/static/context.service';
import { Router } from '@angular/router';

@Injectable()
export class JWTInterceptor implements HttpInterceptor {
  constructor(private router:Router) {}
  intercept(request: HttpRequest<any>, next: HttpHandler): Observable<HttpEvent<any>> {

    request = request.clone({
      setHeaders: {
             "Authorization" : "Bearer " +  ContextService.GetContext().token
      }
    });
    return next.handle(request).pipe(map((event: HttpEvent<any>) => {

      if (event instanceof HttpErrorResponse)
      {
            if(event.status == 401)
            this.router.navigate(['/login']);
      }
      return event;
  }));
  }
}
