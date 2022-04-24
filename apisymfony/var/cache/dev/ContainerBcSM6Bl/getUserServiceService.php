<?php

namespace ContainerBcSM6Bl;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getUserServiceService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'user_service' shared service.
     *
     * @return \App\Core\Domain\Service\UserService
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->services['user_service'] = new \App\Core\Domain\Service\UserService();
    }
}
