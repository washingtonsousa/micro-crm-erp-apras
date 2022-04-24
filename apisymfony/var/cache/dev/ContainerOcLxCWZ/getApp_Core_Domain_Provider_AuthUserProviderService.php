<?php

namespace ContainerOcLxCWZ;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getApp_Core_Domain_Provider_AuthUserProviderService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'app.core.domain.provider.auth_user_provider' shared autowired service.
     *
     * @return \App\Core\Domain\Provider\AuthUserProvider
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'security-core'.\DIRECTORY_SEPARATOR.'User'.\DIRECTORY_SEPARATOR.'UserProviderInterface.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Core'.\DIRECTORY_SEPARATOR.'Domain'.\DIRECTORY_SEPARATOR.'Provider'.\DIRECTORY_SEPARATOR.'AuthUserProvider.php';

        return $container->services['app.core.domain.provider.auth_user_provider'] = new \App\Core\Domain\Provider\AuthUserProvider(($container->services['app.core.domain.repository.usuario_repository'] ?? $container->load('getApp_Core_Domain_Repository_UsuarioRepositoryService')));
    }
}
