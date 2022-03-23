<?php
namespace App\Http\Middleware;

use App\Core\Shared\Event\DomainNotificationContainer;
use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;

class HandleRequestsFilter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

         $response =  $next($request);

        $notificationContainer = App::make(DomainNotificationContainer::class);

        if($notificationContainer->HasNotifications())
            $response->setContent(json_encode($notificationContainer->Notify()))->setStatusCode(400);

        return $response;
    }
}
