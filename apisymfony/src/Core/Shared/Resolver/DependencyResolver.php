<?php
namespace App\Core\Shared\Resolver;

use Symfony\Component\DependencyInjection\ContainerInterface;

class DependencyResolver {
    /**
     * self|null
     */
    private static $instance = null;

    /**
     * ContainerInterface
     */
    private static $myContainer;

    /**
     * @param ContainerInterface $container
     */
    private function __construct(ContainerInterface $container)
    {
        self::$myContainer = $container;
    }

    /**
     * @param string $serviceId
     *
     * @return object
     * @throws \Exception
     */
    public static function make($serviceId)
    {
        if (null === self::$instance) {
            throw new \Exception("Facade is not instantiated");
        }

        return self::$myContainer->get($serviceId);
    }

 
    public static function init($container)
    {
        if (null === self::$instance) {
            self::$instance = new self($container);
        }

        return self::$instance;
    }

    public static function getInstance() {
        return self::$myContainer;
    }
}