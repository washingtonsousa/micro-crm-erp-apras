<?php

namespace App;

use App\Core\Shared\Resolver\DependencyResolver;
use App\Core\Shared\Event\DomainNotificationEvent;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\EventDispatcher\DependencyInjection\AddEventAliasesPass;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;

class Kernel extends BaseKernel implements CompilerPassInterface
{
    use MicroKernelTrait;

    protected function build(ContainerBuilder $container): void
    {

        $container->addCompilerPass(new AddEventAliasesPass([
            DomainNotificationEvent::class => 'notification.emit',
        ]));

        parent::build($container);

        

    }

    public function boot()
    {
        parent::boot();
        date_default_timezone_set("America/Sao_Paulo");

        DependencyResolver::init($this->container);
        
    }

    public function process(ContainerBuilder $container): void
    {      
    }
}
