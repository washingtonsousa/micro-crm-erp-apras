<?php

namespace ContainerJ3aijA4;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_KfwZsneService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.KfwZsne' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.KfwZsne'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'response' => ['privates', '.errored..service_locator.KfwZsne.Symfony\\Component\\HttpFoundation\\Response', NULL, 'Cannot autowire service ".service_locator.KfwZsne": it references class "Symfony\\Component\\HttpFoundation\\Response" but no such service exists.'],
        ], [
            'response' => 'Symfony\\Component\\HttpFoundation\\Response',
        ]);
    }
}
