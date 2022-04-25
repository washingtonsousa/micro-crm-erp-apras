<?php

namespace ContainerBXtsU8g;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_ZJR52sEService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.zJR52sE' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.zJR52sE'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'event_dispatcher' => ['services', 'event_dispatcher', 'getEventDispatcherService', false],
            'security.event_dispatcher.login' => ['privates', 'security.event_dispatcher.login', 'getSecurity_EventDispatcher_LoginService', true],
            'security.event_dispatcher.main' => ['privates', 'security.event_dispatcher.main', 'getSecurity_EventDispatcher_MainService', false],
            'security.event_dispatcher.register' => ['privates', 'security.event_dispatcher.register', 'getSecurity_EventDispatcher_RegisterService', true],
            'security.event_dispatcher.test' => ['privates', 'security.event_dispatcher.test', 'getSecurity_EventDispatcher_TestService', true],
        ], [
            'event_dispatcher' => '?',
            'security.event_dispatcher.login' => 'Symfony\\Component\\EventDispatcher\\EventDispatcher',
            'security.event_dispatcher.main' => 'Symfony\\Component\\EventDispatcher\\EventDispatcher',
            'security.event_dispatcher.register' => 'Symfony\\Component\\EventDispatcher\\EventDispatcher',
            'security.event_dispatcher.test' => 'Symfony\\Component\\EventDispatcher\\EventDispatcher',
        ]);
    }
}