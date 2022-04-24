<?php

// This file has been auto-generated by the Symfony Dependency Injection Component
// You can reference it in the "opcache.preload" php.ini setting on PHP >= 7.4 when preloading is desired

use Symfony\Component\DependencyInjection\Dumper\Preloader;

if (in_array(PHP_SAPI, ['cli', 'phpdbg'], true)) {
    return;
}

require dirname(__DIR__, 3).''.\DIRECTORY_SEPARATOR.'vendor/autoload.php';
(require __DIR__.'/App_KernelDevDebugContainer.php')->set(\ContainerBcSM6Bl\App_KernelDevDebugContainer::class, null);
require __DIR__.'/ContainerBcSM6Bl/EntityManager_9a5be93.php';
require __DIR__.'/ContainerBcSM6Bl/getWebProfiler_Controller_RouterService.php';
require __DIR__.'/ContainerBcSM6Bl/getWebProfiler_Controller_ProfilerService.php';
require __DIR__.'/ContainerBcSM6Bl/getWebProfiler_Controller_ExceptionPanelService.php';
require __DIR__.'/ContainerBcSM6Bl/getUserServiceService.php';
require __DIR__.'/ContainerBcSM6Bl/getTwig_Runtime_SecurityCsrfService.php';
require __DIR__.'/ContainerBcSM6Bl/getTwig_Runtime_HttpkernelService.php';
require __DIR__.'/ContainerBcSM6Bl/getSession_FactoryService.php';
require __DIR__.'/ContainerBcSM6Bl/getServicesResetterService.php';
require __DIR__.'/ContainerBcSM6Bl/getSecurity_UserPasswordHasherService.php';
require __DIR__.'/ContainerBcSM6Bl/getSecurity_PasswordHasherFactoryService.php';
require __DIR__.'/ContainerBcSM6Bl/getSecurity_Logout_Listener_CsrfTokenClearingService.php';
require __DIR__.'/ContainerBcSM6Bl/getSecurity_Listener_UserProviderService.php';
require __DIR__.'/ContainerBcSM6Bl/getSecurity_Listener_UserChecker_TestService.php';
require __DIR__.'/ContainerBcSM6Bl/getSecurity_Listener_UserChecker_RegisterService.php';
require __DIR__.'/ContainerBcSM6Bl/getSecurity_Listener_UserChecker_MainService.php';
require __DIR__.'/ContainerBcSM6Bl/getSecurity_Listener_UserChecker_LoginService.php';
require __DIR__.'/ContainerBcSM6Bl/getSecurity_Listener_Test_UserProviderService.php';
require __DIR__.'/ContainerBcSM6Bl/getSecurity_Listener_Session_MainService.php';
require __DIR__.'/ContainerBcSM6Bl/getSecurity_Listener_PasswordMigratingService.php';
require __DIR__.'/ContainerBcSM6Bl/getSecurity_Listener_Main_UserProviderService.php';
require __DIR__.'/ContainerBcSM6Bl/getSecurity_Listener_Login_UserProviderService.php';
require __DIR__.'/ContainerBcSM6Bl/getSecurity_Listener_CsrfProtectionService.php';
require __DIR__.'/ContainerBcSM6Bl/getSecurity_Listener_CheckAuthenticatorCredentialsService.php';
require __DIR__.'/ContainerBcSM6Bl/getSecurity_HttpUtilsService.php';
require __DIR__.'/ContainerBcSM6Bl/getSecurity_Firewall_Map_Context_TestService.php';
require __DIR__.'/ContainerBcSM6Bl/getSecurity_Firewall_Map_Context_RegisterService.php';
require __DIR__.'/ContainerBcSM6Bl/getSecurity_Firewall_Map_Context_MainService.php';
require __DIR__.'/ContainerBcSM6Bl/getSecurity_Firewall_Map_Context_LoginService.php';
require __DIR__.'/ContainerBcSM6Bl/getSecurity_Firewall_Map_Context_DevService.php';
require __DIR__.'/ContainerBcSM6Bl/getSecurity_EventDispatcher_TestService.php';
require __DIR__.'/ContainerBcSM6Bl/getSecurity_EventDispatcher_RegisterService.php';
require __DIR__.'/ContainerBcSM6Bl/getSecurity_EventDispatcher_LoginService.php';
require __DIR__.'/ContainerBcSM6Bl/getSecurity_Csrf_TokenStorageService.php';
require __DIR__.'/ContainerBcSM6Bl/getSecurity_Csrf_TokenManagerService.php';
require __DIR__.'/ContainerBcSM6Bl/getSecurity_ChannelListenerService.php';
require __DIR__.'/ContainerBcSM6Bl/getSecurity_AuthorizationCheckerService.php';
require __DIR__.'/ContainerBcSM6Bl/getSecurity_Authenticator_Jwt_TestService.php';
require __DIR__.'/ContainerBcSM6Bl/getSecurity_Authenticator_JsonLogin_LoginService.php';
require __DIR__.'/ContainerBcSM6Bl/getSecurity_AccessMapService.php';
require __DIR__.'/ContainerBcSM6Bl/getSecurity_AccessListenerService.php';
require __DIR__.'/ContainerBcSM6Bl/getSecrets_VaultService.php';
require __DIR__.'/ContainerBcSM6Bl/getRouting_LoaderService.php';
require __DIR__.'/ContainerBcSM6Bl/getLexikJwtAuthentication_KeyLoaderService.php';
require __DIR__.'/ContainerBcSM6Bl/getLexikJwtAuthentication_JwtManagerService.php';
require __DIR__.'/ContainerBcSM6Bl/getLexikJwtAuthentication_EncoderService.php';
require __DIR__.'/ContainerBcSM6Bl/getGenericHandlerService.php';
require __DIR__.'/ContainerBcSM6Bl/getFragment_Renderer_InlineService.php';
require __DIR__.'/ContainerBcSM6Bl/getErrorHandler_ErrorRenderer_HtmlService.php';
require __DIR__.'/ContainerBcSM6Bl/getErrorControllerService.php';
require __DIR__.'/ContainerBcSM6Bl/getDomainNotifySubscriberService.php';
require __DIR__.'/ContainerBcSM6Bl/getDoctrine_UuidGeneratorService.php';
require __DIR__.'/ContainerBcSM6Bl/getDoctrine_UlidGeneratorService.php';
require __DIR__.'/ContainerBcSM6Bl/getDoctrine_Orm_Listeners_DoctrineTokenProviderSchemaSubscriberService.php';
require __DIR__.'/ContainerBcSM6Bl/getDoctrine_Orm_Listeners_DoctrineDbalCacheAdapterSchemaSubscriberService.php';
require __DIR__.'/ContainerBcSM6Bl/getDoctrine_Orm_DefaultListeners_AttachEntityListenersService.php';
require __DIR__.'/ContainerBcSM6Bl/getDoctrine_Orm_DefaultEntityManagerService.php';
require __DIR__.'/ContainerBcSM6Bl/getDoctrine_Orm_DefaultAnnotationMetadataDriverService.php';
require __DIR__.'/ContainerBcSM6Bl/getDoctrine_Migrations_ContainerAwareMigrationsFactoryService.php';
require __DIR__.'/ContainerBcSM6Bl/getDoctrine_Dbal_DefaultConnectionService.php';
require __DIR__.'/ContainerBcSM6Bl/getDebug_Security_Voter_VoteListenerService.php';
require __DIR__.'/ContainerBcSM6Bl/getDebug_Security_Voter_Security_Access_SimpleRoleVoterService.php';
require __DIR__.'/ContainerBcSM6Bl/getDebug_Security_Voter_Security_Access_AuthenticatedVoterService.php';
require __DIR__.'/ContainerBcSM6Bl/getDebug_Security_UserValueResolverService.php';
require __DIR__.'/ContainerBcSM6Bl/getDebug_Security_Firewall_Authenticator_TestService.php';
require __DIR__.'/ContainerBcSM6Bl/getDebug_Security_Firewall_Authenticator_RegisterService.php';
require __DIR__.'/ContainerBcSM6Bl/getDebug_Security_Firewall_Authenticator_MainService.php';
require __DIR__.'/ContainerBcSM6Bl/getDebug_Security_Firewall_Authenticator_LoginService.php';
require __DIR__.'/ContainerBcSM6Bl/getDebug_FileLinkFormatter_UrlFormatService.php';
require __DIR__.'/ContainerBcSM6Bl/getDebug_ArgumentResolver_VariadicService.php';
require __DIR__.'/ContainerBcSM6Bl/getDebug_ArgumentResolver_SessionService.php';
require __DIR__.'/ContainerBcSM6Bl/getDebug_ArgumentResolver_ServiceService.php';
require __DIR__.'/ContainerBcSM6Bl/getDebug_ArgumentResolver_RequestAttributeService.php';
require __DIR__.'/ContainerBcSM6Bl/getDebug_ArgumentResolver_RequestService.php';
require __DIR__.'/ContainerBcSM6Bl/getDebug_ArgumentResolver_NotTaggedControllerService.php';
require __DIR__.'/ContainerBcSM6Bl/getDebug_ArgumentResolver_DefaultService.php';
require __DIR__.'/ContainerBcSM6Bl/getDataCollector_Request_SessionCollectorService.php';
require __DIR__.'/ContainerBcSM6Bl/getContainer_EnvVarProcessorsLocatorService.php';
require __DIR__.'/ContainerBcSM6Bl/getContainer_EnvVarProcessorService.php';
require __DIR__.'/ContainerBcSM6Bl/getCache_SystemClearerService.php';
require __DIR__.'/ContainerBcSM6Bl/getCache_GlobalClearerService.php';
require __DIR__.'/ContainerBcSM6Bl/getCache_AppClearerService.php';
require __DIR__.'/ContainerBcSM6Bl/getApp_Core_Domain_Repository_UsuarioRepositoryService.php';
require __DIR__.'/ContainerBcSM6Bl/getApp_Core_Domain_Provider_AuthUserProviderService.php';
require __DIR__.'/ContainerBcSM6Bl/getAnnotations_ReaderService.php';
require __DIR__.'/ContainerBcSM6Bl/getAnnotations_CachedReaderService.php';
require __DIR__.'/ContainerBcSM6Bl/getTemplateControllerService.php';
require __DIR__.'/ContainerBcSM6Bl/getRedirectControllerService.php';
require __DIR__.'/ContainerBcSM6Bl/getProfilerControllerService.php';
require __DIR__.'/ContainerBcSM6Bl/getUsuarioControllerService.php';
require __DIR__.'/ContainerBcSM6Bl/getLoginControllerService.php';
require __DIR__.'/ContainerBcSM6Bl/get_ServiceLocator_U47of_0Service.php';
require __DIR__.'/ContainerBcSM6Bl/get_ServiceLocator_MfGR7xqService.php';
require __DIR__.'/ContainerBcSM6Bl/get_ServiceLocator_L1ae_QzService.php';
require __DIR__.'/ContainerBcSM6Bl/get_ServiceLocator_Akxvtl7Service.php';
require __DIR__.'/ContainerBcSM6Bl/get_ServiceLocator_KfwZsneService.php';
require __DIR__.'/ContainerBcSM6Bl/get_ServiceLocator_KfbR3DYService.php';

$classes = [];
$classes[] = 'Symfony\Bundle\FrameworkBundle\FrameworkBundle';
$classes[] = 'Doctrine\Bundle\DoctrineBundle\DoctrineBundle';
$classes[] = 'Doctrine\Bundle\MigrationsBundle\DoctrineMigrationsBundle';
$classes[] = 'Symfony\Bundle\MakerBundle\MakerBundle';
$classes[] = 'Symfony\Bundle\SecurityBundle\SecurityBundle';
$classes[] = 'Lexik\Bundle\JWTAuthenticationBundle\LexikJWTAuthenticationBundle';
$classes[] = 'Symfony\Bundle\TwigBundle\TwigBundle';
$classes[] = 'Symfony\Bundle\WebProfilerBundle\WebProfilerBundle';
$classes[] = 'Nelmio\CorsBundle\NelmioCorsBundle';
$classes[] = 'Symfony\Component\HttpKernel\Profiler\Profiler';
$classes[] = 'Symfony\Component\HttpKernel\Profiler\FileProfilerStorage';
$classes[] = 'Symfony\Component\HttpKernel\DataCollector\TimeDataCollector';
$classes[] = 'Symfony\Component\HttpKernel\DataCollector\MemoryDataCollector';
$classes[] = 'Symfony\Component\HttpKernel\DataCollector\AjaxDataCollector';
$classes[] = 'Symfony\Component\HttpKernel\DataCollector\ExceptionDataCollector';
$classes[] = 'Symfony\Component\HttpKernel\DataCollector\LoggerDataCollector';
$classes[] = 'Symfony\Component\HttpKernel\DataCollector\EventDataCollector';
$classes[] = 'Symfony\Component\Cache\DataCollector\CacheDataCollector';
$classes[] = 'Symfony\Bundle\SecurityBundle\DataCollector\SecurityDataCollector';
$classes[] = 'Symfony\Component\Security\Core\Role\RoleHierarchy';
$classes[] = 'Symfony\Bridge\Twig\DataCollector\TwigDataCollector';
$classes[] = 'Doctrine\Bundle\DoctrineBundle\DataCollector\DoctrineDataCollector';
$classes[] = 'Doctrine\Bundle\MigrationsBundle\Collector\MigrationsCollector';
$classes[] = 'Doctrine\Bundle\MigrationsBundle\Collector\MigrationsFlattener';
$classes[] = 'Symfony\Component\HttpKernel\DataCollector\ConfigDataCollector';
$classes[] = 'Symfony\Component\Cache\Adapter\TraceableAdapter';
$classes[] = 'Symfony\Component\Cache\Adapter\FilesystemAdapter';
$classes[] = 'Symfony\Component\HttpFoundation\RequestMatcher';
$classes[] = 'Symfony\Component\DependencyInjection\ServiceLocator';
$classes[] = 'App\Controller\LoginController';
$classes[] = 'App\Controller\UsuarioController';
$classes[] = 'Doctrine\Bundle\DoctrineBundle\Controller\ProfilerController';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Controller\RedirectController';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Controller\TemplateController';
$classes[] = 'Symfony\Component\Cache\Adapter\PhpArrayAdapter';
$classes[] = 'Doctrine\Common\Annotations\PsrCachedReader';
$classes[] = 'Doctrine\Common\Annotations\AnnotationReader';
$classes[] = 'Doctrine\Common\Annotations\AnnotationRegistry';
$classes[] = 'App\Core\Domain\Provider\AuthUserProvider';
$classes[] = 'App\Core\Domain\Repository\UsuarioRepository';
$classes[] = 'Symfony\Component\Cache\Adapter\AdapterInterface';
$classes[] = 'Symfony\Component\Cache\Adapter\AbstractAdapter';
$classes[] = 'Symfony\Component\HttpKernel\CacheClearer\Psr6CacheClearer';
$classes[] = 'Symfony\Component\Cache\Marshaller\DefaultMarshaller';
$classes[] = 'Symfony\Component\Cache\Adapter\ArrayAdapter';
$classes[] = 'Symfony\Component\Config\Resource\SelfCheckingResourceChecker';
$classes[] = 'Symfony\Component\DependencyInjection\EnvVarProcessor';
$classes[] = 'Symfony\Component\HttpKernel\DataCollector\RequestDataCollector';
$classes[] = 'Symfony\Bundle\FrameworkBundle\DataCollector\RouterDataCollector';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver\TraceableValueResolver';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver\DefaultValueResolver';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver\NotTaggedControllerValueResolver';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver\RequestValueResolver';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver\RequestAttributeValueResolver';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver\ServiceValueResolver';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver\SessionValueResolver';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver\VariadicValueResolver';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\DebugHandlersListener';
$classes[] = 'Symfony\Component\HttpKernel\Debug\FileLinkFormatter';
$classes[] = 'Symfony\Component\Security\Core\Authorization\TraceableAccessDecisionManager';
$classes[] = 'Symfony\Component\Security\Core\Authorization\AccessDecisionManager';
$classes[] = 'Symfony\Component\Security\Core\Authorization\Strategy\AffirmativeStrategy';
$classes[] = 'Symfony\Bundle\SecurityBundle\Debug\TraceableFirewallListener';
$classes[] = 'Symfony\Component\Security\Http\Authenticator\Debug\TraceableAuthenticatorManagerListener';
$classes[] = 'Symfony\Component\Security\Http\Firewall\AuthenticatorManagerListener';
$classes[] = 'Symfony\Component\Security\Http\Authentication\AuthenticatorManager';
$classes[] = 'Symfony\Component\Security\Http\Controller\UserValueResolver';
$classes[] = 'Symfony\Component\Security\Core\Authorization\Voter\TraceableVoter';
$classes[] = 'Symfony\Component\Security\Core\Authorization\Voter\AuthenticatedVoter';
$classes[] = 'Symfony\Component\Security\Core\Authorization\Voter\RoleVoter';
$classes[] = 'Symfony\Bundle\SecurityBundle\EventListener\VoteListener';
$classes[] = 'Symfony\Component\Stopwatch\Stopwatch';
$classes[] = 'Symfony\Component\DependencyInjection\Config\ContainerParametersResourceChecker';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\DisallowRobotsIndexingListener';
$classes[] = 'Doctrine\Bundle\DoctrineBundle\Registry';
$classes[] = 'Doctrine\DBAL\Connection';
$classes[] = 'Doctrine\Bundle\DoctrineBundle\ConnectionFactory';
$classes[] = 'Doctrine\DBAL\Configuration';
$classes[] = 'Doctrine\DBAL\Logging\LoggerChain';
$classes[] = 'Symfony\Bridge\Doctrine\Logger\DbalLogger';
$classes[] = 'Symfony\Bridge\Doctrine\ContainerAwareEventManager';
$classes[] = 'Doctrine\DBAL\Logging\DebugStack';
$classes[] = 'Doctrine\Bundle\MigrationsBundle\MigrationsFactory\ContainerAwareMigrationFactory';
$classes[] = 'Doctrine\Migrations\Version\MigrationFactory';
$classes[] = 'Doctrine\Migrations\DependencyFactory';
$classes[] = 'Doctrine\Migrations\Configuration\Migration\ExistingConfiguration';
$classes[] = 'Doctrine\Migrations\Configuration\Configuration';
$classes[] = 'Doctrine\Migrations\Metadata\Storage\TableMetadataStorageConfiguration';
$classes[] = 'Doctrine\Migrations\Configuration\EntityManager\ManagerRegistryEntityManager';
$classes[] = 'Doctrine\ORM\Mapping\Driver\AnnotationDriver';
$classes[] = 'Doctrine\ORM\Proxy\Autoloader';
$classes[] = 'Doctrine\ORM\EntityManager';
$classes[] = 'Doctrine\ORM\Configuration';
$classes[] = 'Doctrine\Common\Cache\CacheProvider';
$classes[] = 'Doctrine\Common\Cache\Psr6\DoctrineProvider';
$classes[] = 'Doctrine\Bundle\DoctrineBundle\Mapping\MappingDriver';
$classes[] = 'Doctrine\Persistence\Mapping\Driver\MappingDriverChain';
$classes[] = 'Doctrine\ORM\Mapping\UnderscoreNamingStrategy';
$classes[] = 'Doctrine\ORM\Mapping\DefaultQuoteStrategy';
$classes[] = 'Doctrine\Bundle\DoctrineBundle\Mapping\ContainerEntityListenerResolver';
$classes[] = 'Doctrine\Bundle\DoctrineBundle\Repository\ContainerRepositoryFactory';
$classes[] = 'Doctrine\Bundle\DoctrineBundle\ManagerConfigurator';
$classes[] = 'Doctrine\ORM\Tools\AttachEntityListenersListener';
$classes[] = 'Symfony\Bridge\Doctrine\SchemaListener\DoctrineDbalCacheAdapterSchemaSubscriber';
$classes[] = 'Symfony\Bridge\Doctrine\SchemaListener\RememberMeTokenProviderDoctrineSchemaSubscriber';
$classes[] = 'Symfony\Bridge\Doctrine\IdGenerator\UlidGenerator';
$classes[] = 'Symfony\Bridge\Doctrine\IdGenerator\UuidGenerator';
$classes[] = 'App\Core\Shared\Event\DomainNotificationContainer';
$classes[] = 'App\Core\Shared\EventListener\DomainEventListener';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ErrorController';
$classes[] = 'Symfony\Bridge\Twig\ErrorRenderer\TwigErrorRenderer';
$classes[] = 'Symfony\Component\ErrorHandler\ErrorRenderer\HtmlErrorRenderer';
$classes[] = 'Symfony\Component\HttpKernel\Debug\TraceableEventDispatcher';
$classes[] = 'Symfony\Component\EventDispatcher\EventDispatcher';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\ErrorListener';
$classes[] = 'Symfony\Component\HttpKernel\Fragment\InlineFragmentRenderer';
$classes[] = 'App\Core\Shared\Handler\GenericHandler';
$classes[] = 'Symfony\Component\Runtime\Runner\Symfony\HttpKernelRunner';
$classes[] = 'Symfony\Component\Runtime\Runner\Symfony\ResponseRunner';
$classes[] = 'Symfony\Component\Runtime\SymfonyRuntime';
$classes[] = 'Symfony\Component\HttpKernel\HttpKernel';
$classes[] = 'Symfony\Component\HttpKernel\Controller\TraceableControllerResolver';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Controller\ControllerResolver';
$classes[] = 'Symfony\Component\HttpKernel\Controller\TraceableArgumentResolver';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver';
$classes[] = 'Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadataFactory';
$classes[] = 'App\Kernel';
$classes[] = 'Lexik\Bundle\JWTAuthenticationBundle\Encoder\LcobucciJWTEncoder';
$classes[] = 'Lexik\Bundle\JWTAuthenticationBundle\Services\JWSProvider\LcobucciJWSProvider';
$classes[] = 'Lexik\Bundle\JWTAuthenticationBundle\Services\JWTManager';
$classes[] = 'Lexik\Bundle\JWTAuthenticationBundle\Services\KeyLoader\RawKeyLoader';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\LocaleAwareListener';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\LocaleListener';
$classes[] = 'Symfony\Component\HttpKernel\Log\Logger';
$classes[] = 'Nelmio\CorsBundle\EventListener\CacheableResponseVaryListener';
$classes[] = 'Nelmio\CorsBundle\EventListener\CorsListener';
$classes[] = 'Nelmio\CorsBundle\Options\Resolver';
$classes[] = 'Nelmio\CorsBundle\Options\ConfigProvider';
$classes[] = 'App\Core\Shared\EventSubscribers\DomainNotificationSubscriber';
$classes[] = 'Symfony\Component\DependencyInjection\ParameterBag\ContainerBag';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\ProfilerListener';
$classes[] = 'Symfony\Component\HttpFoundation\RequestStack';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\ResponseListener';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Routing\Router';
$classes[] = 'Symfony\Component\Config\ResourceCheckerConfigCacheFactory';
$classes[] = 'Symfony\Component\Routing\RequestContext';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\RouterListener';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Routing\DelegatingLoader';
$classes[] = 'Symfony\Component\Config\Loader\LoaderResolver';
$classes[] = 'Symfony\Component\Routing\Loader\XmlFileLoader';
$classes[] = 'Symfony\Component\HttpKernel\Config\FileLocator';
$classes[] = 'Symfony\Component\Routing\Loader\YamlFileLoader';
$classes[] = 'Symfony\Component\Routing\Loader\PhpFileLoader';
$classes[] = 'Symfony\Component\Routing\Loader\GlobFileLoader';
$classes[] = 'Symfony\Component\Routing\Loader\DirectoryLoader';
$classes[] = 'Symfony\Component\Routing\Loader\ContainerLoader';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Routing\AnnotatedRouteControllerLoader';
$classes[] = 'Symfony\Component\Routing\Loader\AnnotationDirectoryLoader';
$classes[] = 'Symfony\Component\Routing\Loader\AnnotationFileLoader';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Secrets\SodiumVault';
$classes[] = 'Symfony\Component\String\LazyString';
$classes[] = 'Symfony\Component\Security\Http\Firewall\AccessListener';
$classes[] = 'Symfony\Component\Security\Http\AccessMap';
$classes[] = 'Symfony\Component\Security\Core\Authentication\AuthenticationTrustResolver';
$classes[] = 'Symfony\Component\Security\Http\Authenticator\JsonLoginAuthenticator';
$classes[] = 'Symfony\Component\Security\Http\Authentication\CustomAuthenticationSuccessHandler';
$classes[] = 'Lexik\Bundle\JWTAuthenticationBundle\Security\Http\Authentication\AuthenticationSuccessHandler';
$classes[] = 'Symfony\Component\Security\Http\Authentication\CustomAuthenticationFailureHandler';
$classes[] = 'Lexik\Bundle\JWTAuthenticationBundle\Security\Http\Authentication\AuthenticationFailureHandler';
$classes[] = 'Symfony\Component\PropertyAccess\PropertyAccessor';
$classes[] = 'Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor';
$classes[] = 'Lexik\Bundle\JWTAuthenticationBundle\Security\Authenticator\JWTAuthenticator';
$classes[] = 'Lexik\Bundle\JWTAuthenticationBundle\TokenExtractor\ChainTokenExtractor';
$classes[] = 'Lexik\Bundle\JWTAuthenticationBundle\TokenExtractor\AuthorizationHeaderTokenExtractor';
$classes[] = 'Symfony\Component\Security\Core\Authorization\AuthorizationChecker';
$classes[] = 'Symfony\Component\Security\Http\Firewall\ChannelListener';
$classes[] = 'Symfony\Component\Security\Http\Firewall\ContextListener';
$classes[] = 'Symfony\Component\Security\Csrf\CsrfTokenManager';
$classes[] = 'Symfony\Component\Security\Csrf\TokenGenerator\UriSafeTokenGenerator';
$classes[] = 'Symfony\Component\Security\Csrf\TokenStorage\SessionTokenStorage';
$classes[] = 'Symfony\Bundle\SecurityBundle\Security\FirewallMap';
$classes[] = 'Symfony\Bundle\SecurityBundle\Security\FirewallContext';
$classes[] = 'Symfony\Bundle\SecurityBundle\Security\FirewallConfig';
$classes[] = 'Symfony\Component\Security\Http\Firewall\ExceptionListener';
$classes[] = 'Symfony\Bundle\SecurityBundle\Security\LazyFirewallContext';
$classes[] = 'Symfony\Component\Security\Http\HttpUtils';
$classes[] = 'Symfony\Component\Security\Http\EventListener\CheckCredentialsListener';
$classes[] = 'Symfony\Component\Security\Http\EventListener\CsrfProtectionListener';
$classes[] = 'Symfony\Component\Security\Http\EventListener\UserProviderListener';
$classes[] = 'Symfony\Component\Security\Http\EventListener\PasswordMigratingListener';
$classes[] = 'Symfony\Component\Security\Http\EventListener\SessionStrategyListener';
$classes[] = 'Symfony\Component\Security\Http\Session\SessionAuthenticationStrategy';
$classes[] = 'Symfony\Component\Security\Http\EventListener\UserCheckerListener';
$classes[] = 'Symfony\Component\Security\Http\EventListener\CsrfTokenClearingLogoutListener';
$classes[] = 'Symfony\Component\Security\Http\Logout\LogoutUrlGenerator';
$classes[] = 'Symfony\Component\PasswordHasher\Hasher\PasswordHasherFactory';
$classes[] = 'Symfony\Component\Security\Core\Authentication\Token\Storage\UsageTrackingTokenStorage';
$classes[] = 'Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage';
$classes[] = 'Symfony\Component\Security\Core\User\InMemoryUserChecker';
$classes[] = 'Symfony\Component\PasswordHasher\Hasher\UserPasswordHasher';
$classes[] = 'Symfony\Component\DependencyInjection\ContainerInterface';
$classes[] = 'Symfony\Component\HttpKernel\DependencyInjection\ServicesResetter';
$classes[] = 'Symfony\Component\HttpFoundation\Session\SessionFactory';
$classes[] = 'Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorageFactory';
$classes[] = 'Symfony\Component\HttpFoundation\Session\Storage\MetadataBag';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\SessionListener';
$classes[] = 'Symfony\Component\String\Slugger\AsciiSlugger';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\StreamedResponseListener';
$classes[] = 'Twig\Cache\FilesystemCache';
$classes[] = 'Twig\Extension\CoreExtension';
$classes[] = 'Twig\Extension\EscaperExtension';
$classes[] = 'Twig\Extension\OptimizerExtension';
$classes[] = 'Twig\Extension\StagingExtension';
$classes[] = 'Twig\ExtensionSet';
$classes[] = 'Twig\Template';
$classes[] = 'Twig\TemplateWrapper';
$classes[] = 'Twig\Environment';
$classes[] = 'Twig\Loader\FilesystemLoader';
$classes[] = 'Symfony\Bridge\Twig\Extension\CsrfExtension';
$classes[] = 'Symfony\Bridge\Twig\Extension\ProfilerExtension';
$classes[] = 'Symfony\Bridge\Twig\Extension\TranslationExtension';
$classes[] = 'Symfony\Bridge\Twig\Extension\CodeExtension';
$classes[] = 'Symfony\Bridge\Twig\Extension\RoutingExtension';
$classes[] = 'Symfony\Bridge\Twig\Extension\YamlExtension';
$classes[] = 'Symfony\Bridge\Twig\Extension\StopwatchExtension';
$classes[] = 'Symfony\Bridge\Twig\Extension\HttpKernelExtension';
$classes[] = 'Symfony\Bridge\Twig\Extension\HttpFoundationExtension';
$classes[] = 'Symfony\Component\HttpFoundation\UrlHelper';
$classes[] = 'Doctrine\Bundle\DoctrineBundle\Twig\DoctrineExtension';
$classes[] = 'Twig\Extension\DebugExtension';
$classes[] = 'Symfony\Bundle\WebProfilerBundle\Twig\WebProfilerExtension';
$classes[] = 'Symfony\Component\VarDumper\Dumper\HtmlDumper';
$classes[] = 'Symfony\Bridge\Twig\AppVariable';
$classes[] = 'Twig\RuntimeLoader\ContainerRuntimeLoader';
$classes[] = 'Symfony\Bundle\TwigBundle\DependencyInjection\Configurator\EnvironmentConfigurator';
$classes[] = 'Twig\Profiler\Profile';
$classes[] = 'Symfony\Bridge\Twig\Extension\HttpKernelRuntime';
$classes[] = 'Symfony\Component\HttpKernel\DependencyInjection\LazyLoadingFragmentHandler';
$classes[] = 'Symfony\Component\HttpKernel\Fragment\FragmentUriGenerator';
$classes[] = 'Symfony\Component\HttpKernel\UriSigner';
$classes[] = 'Symfony\Bridge\Twig\Extension\CsrfRuntime';
$classes[] = 'App\Core\Domain\Service\UserService';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\ValidateRequestListener';
$classes[] = 'Symfony\Bundle\WebProfilerBundle\Controller\ExceptionPanelController';
$classes[] = 'Symfony\Bundle\WebProfilerBundle\Controller\ProfilerController';
$classes[] = 'Symfony\Bundle\WebProfilerBundle\Controller\RouterController';
$classes[] = 'Symfony\Bundle\WebProfilerBundle\Csp\ContentSecurityPolicyHandler';
$classes[] = 'Symfony\Bundle\WebProfilerBundle\Csp\NonceGenerator';
$classes[] = 'Symfony\Bundle\WebProfilerBundle\EventListener\WebDebugToolbarListener';

$preloaded = Preloader::preload($classes);
