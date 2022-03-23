<?php
namespace App\Core\Infra\Provider\Ioc;

use App\Core\Application\Abstraction\Interface\Service\IUserAppService;
use App\Core\Application\Service\UserAppService;
use App\Core\Domain\Abstraction\Interface\IUserRepository;
use App\Core\Domain\Repository\UserRepository;
use App\Core\Shared\Abstraction\Interface\IDomainNotificationContainer;
use App\Core\Shared\Abstraction\Interface\IHandler;
use App\Core\Shared\Event\DomainNotificationContainer;
use App\Core\Shared\Handler\GenericHandler;
use App\Core\Shared\Handler\HandlerAggregator;
use Illuminate\Contracts\Foundation\Application;

class DomainServiceProviderModule {

    public static function Inject(Application $app) {

        $app->scoped(IUserRepository::class, UserRepository::class);
        $app->bind(IUserAppService::class, UserAppService::class);

        $app->scoped(DomainNotificationContainer::class);
        $app->scoped(IDomainNotificationContainer::class, function($app) {

            return $app->make(DomainNotificationContainer::class);
        });

        $app->scoped(GenericHandler::class);

        $app->tag([DomainNotificationContainer::class, GenericHandler::class], 'handlers');

        $app->bind(HandlerAggregator::class, function($app)
        {
            return new HandlerAggregator($app->tagged('handlers'));
        });

    }

}
