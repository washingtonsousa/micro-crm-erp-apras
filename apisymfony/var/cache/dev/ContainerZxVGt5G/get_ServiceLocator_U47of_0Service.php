<?php

namespace ContainerZxVGt5G;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_U47of_0Service extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.u47of.0' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.u47of.0'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'container' => ['privates', '.errored..service_locator.u47of.0.Symfony\\Component\\DependencyInjection\\ContainerBuilder', NULL, 'Cannot autowire service ".service_locator.u47of.0": it references class "Symfony\\Component\\DependencyInjection\\ContainerBuilder" but no such service exists.'],
        ], [
            'container' => 'Symfony\\Component\\DependencyInjection\\ContainerBuilder',
        ]);
    }
}
