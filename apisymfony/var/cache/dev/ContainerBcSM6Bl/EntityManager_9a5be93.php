<?php

namespace ContainerBcSM6Bl;
include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'doctrine'.\DIRECTORY_SEPARATOR.'persistence'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Persistence'.\DIRECTORY_SEPARATOR.'ObjectManager.php';
include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'doctrine'.\DIRECTORY_SEPARATOR.'orm'.\DIRECTORY_SEPARATOR.'lib'.\DIRECTORY_SEPARATOR.'Doctrine'.\DIRECTORY_SEPARATOR.'ORM'.\DIRECTORY_SEPARATOR.'EntityManagerInterface.php';
include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'doctrine'.\DIRECTORY_SEPARATOR.'orm'.\DIRECTORY_SEPARATOR.'lib'.\DIRECTORY_SEPARATOR.'Doctrine'.\DIRECTORY_SEPARATOR.'ORM'.\DIRECTORY_SEPARATOR.'EntityManager.php';

class EntityManager_9a5be93 extends \Doctrine\ORM\EntityManager implements \ProxyManager\Proxy\VirtualProxyInterface
{
    /**
     * @var \Doctrine\ORM\EntityManager|null wrapped object, if the proxy is initialized
     */
    private $valueHolderf1e50 = null;

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $initializer89091 = null;

    /**
     * @var bool[] map of public properties of the parent class
     */
    private static $publicProperties0c4ad = [
        
    ];

    public function getConnection()
    {
        $this->initializer89091 && ($this->initializer89091->__invoke($valueHolderf1e50, $this, 'getConnection', array(), $this->initializer89091) || 1) && $this->valueHolderf1e50 = $valueHolderf1e50;

        return $this->valueHolderf1e50->getConnection();
    }

    public function getMetadataFactory()
    {
        $this->initializer89091 && ($this->initializer89091->__invoke($valueHolderf1e50, $this, 'getMetadataFactory', array(), $this->initializer89091) || 1) && $this->valueHolderf1e50 = $valueHolderf1e50;

        return $this->valueHolderf1e50->getMetadataFactory();
    }

    public function getExpressionBuilder()
    {
        $this->initializer89091 && ($this->initializer89091->__invoke($valueHolderf1e50, $this, 'getExpressionBuilder', array(), $this->initializer89091) || 1) && $this->valueHolderf1e50 = $valueHolderf1e50;

        return $this->valueHolderf1e50->getExpressionBuilder();
    }

    public function beginTransaction()
    {
        $this->initializer89091 && ($this->initializer89091->__invoke($valueHolderf1e50, $this, 'beginTransaction', array(), $this->initializer89091) || 1) && $this->valueHolderf1e50 = $valueHolderf1e50;

        return $this->valueHolderf1e50->beginTransaction();
    }

    public function getCache()
    {
        $this->initializer89091 && ($this->initializer89091->__invoke($valueHolderf1e50, $this, 'getCache', array(), $this->initializer89091) || 1) && $this->valueHolderf1e50 = $valueHolderf1e50;

        return $this->valueHolderf1e50->getCache();
    }

    public function transactional($func)
    {
        $this->initializer89091 && ($this->initializer89091->__invoke($valueHolderf1e50, $this, 'transactional', array('func' => $func), $this->initializer89091) || 1) && $this->valueHolderf1e50 = $valueHolderf1e50;

        return $this->valueHolderf1e50->transactional($func);
    }

    public function wrapInTransaction(callable $func)
    {
        $this->initializer89091 && ($this->initializer89091->__invoke($valueHolderf1e50, $this, 'wrapInTransaction', array('func' => $func), $this->initializer89091) || 1) && $this->valueHolderf1e50 = $valueHolderf1e50;

        return $this->valueHolderf1e50->wrapInTransaction($func);
    }

    public function commit()
    {
        $this->initializer89091 && ($this->initializer89091->__invoke($valueHolderf1e50, $this, 'commit', array(), $this->initializer89091) || 1) && $this->valueHolderf1e50 = $valueHolderf1e50;

        return $this->valueHolderf1e50->commit();
    }

    public function rollback()
    {
        $this->initializer89091 && ($this->initializer89091->__invoke($valueHolderf1e50, $this, 'rollback', array(), $this->initializer89091) || 1) && $this->valueHolderf1e50 = $valueHolderf1e50;

        return $this->valueHolderf1e50->rollback();
    }

    public function getClassMetadata($className)
    {
        $this->initializer89091 && ($this->initializer89091->__invoke($valueHolderf1e50, $this, 'getClassMetadata', array('className' => $className), $this->initializer89091) || 1) && $this->valueHolderf1e50 = $valueHolderf1e50;

        return $this->valueHolderf1e50->getClassMetadata($className);
    }

    public function createQuery($dql = '')
    {
        $this->initializer89091 && ($this->initializer89091->__invoke($valueHolderf1e50, $this, 'createQuery', array('dql' => $dql), $this->initializer89091) || 1) && $this->valueHolderf1e50 = $valueHolderf1e50;

        return $this->valueHolderf1e50->createQuery($dql);
    }

    public function createNamedQuery($name)
    {
        $this->initializer89091 && ($this->initializer89091->__invoke($valueHolderf1e50, $this, 'createNamedQuery', array('name' => $name), $this->initializer89091) || 1) && $this->valueHolderf1e50 = $valueHolderf1e50;

        return $this->valueHolderf1e50->createNamedQuery($name);
    }

    public function createNativeQuery($sql, \Doctrine\ORM\Query\ResultSetMapping $rsm)
    {
        $this->initializer89091 && ($this->initializer89091->__invoke($valueHolderf1e50, $this, 'createNativeQuery', array('sql' => $sql, 'rsm' => $rsm), $this->initializer89091) || 1) && $this->valueHolderf1e50 = $valueHolderf1e50;

        return $this->valueHolderf1e50->createNativeQuery($sql, $rsm);
    }

    public function createNamedNativeQuery($name)
    {
        $this->initializer89091 && ($this->initializer89091->__invoke($valueHolderf1e50, $this, 'createNamedNativeQuery', array('name' => $name), $this->initializer89091) || 1) && $this->valueHolderf1e50 = $valueHolderf1e50;

        return $this->valueHolderf1e50->createNamedNativeQuery($name);
    }

    public function createQueryBuilder()
    {
        $this->initializer89091 && ($this->initializer89091->__invoke($valueHolderf1e50, $this, 'createQueryBuilder', array(), $this->initializer89091) || 1) && $this->valueHolderf1e50 = $valueHolderf1e50;

        return $this->valueHolderf1e50->createQueryBuilder();
    }

    public function flush($entity = null)
    {
        $this->initializer89091 && ($this->initializer89091->__invoke($valueHolderf1e50, $this, 'flush', array('entity' => $entity), $this->initializer89091) || 1) && $this->valueHolderf1e50 = $valueHolderf1e50;

        return $this->valueHolderf1e50->flush($entity);
    }

    public function find($className, $id, $lockMode = null, $lockVersion = null)
    {
        $this->initializer89091 && ($this->initializer89091->__invoke($valueHolderf1e50, $this, 'find', array('className' => $className, 'id' => $id, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializer89091) || 1) && $this->valueHolderf1e50 = $valueHolderf1e50;

        return $this->valueHolderf1e50->find($className, $id, $lockMode, $lockVersion);
    }

    public function getReference($entityName, $id)
    {
        $this->initializer89091 && ($this->initializer89091->__invoke($valueHolderf1e50, $this, 'getReference', array('entityName' => $entityName, 'id' => $id), $this->initializer89091) || 1) && $this->valueHolderf1e50 = $valueHolderf1e50;

        return $this->valueHolderf1e50->getReference($entityName, $id);
    }

    public function getPartialReference($entityName, $identifier)
    {
        $this->initializer89091 && ($this->initializer89091->__invoke($valueHolderf1e50, $this, 'getPartialReference', array('entityName' => $entityName, 'identifier' => $identifier), $this->initializer89091) || 1) && $this->valueHolderf1e50 = $valueHolderf1e50;

        return $this->valueHolderf1e50->getPartialReference($entityName, $identifier);
    }

    public function clear($entityName = null)
    {
        $this->initializer89091 && ($this->initializer89091->__invoke($valueHolderf1e50, $this, 'clear', array('entityName' => $entityName), $this->initializer89091) || 1) && $this->valueHolderf1e50 = $valueHolderf1e50;

        return $this->valueHolderf1e50->clear($entityName);
    }

    public function close()
    {
        $this->initializer89091 && ($this->initializer89091->__invoke($valueHolderf1e50, $this, 'close', array(), $this->initializer89091) || 1) && $this->valueHolderf1e50 = $valueHolderf1e50;

        return $this->valueHolderf1e50->close();
    }

    public function persist($entity)
    {
        $this->initializer89091 && ($this->initializer89091->__invoke($valueHolderf1e50, $this, 'persist', array('entity' => $entity), $this->initializer89091) || 1) && $this->valueHolderf1e50 = $valueHolderf1e50;

        return $this->valueHolderf1e50->persist($entity);
    }

    public function remove($entity)
    {
        $this->initializer89091 && ($this->initializer89091->__invoke($valueHolderf1e50, $this, 'remove', array('entity' => $entity), $this->initializer89091) || 1) && $this->valueHolderf1e50 = $valueHolderf1e50;

        return $this->valueHolderf1e50->remove($entity);
    }

    public function refresh($entity)
    {
        $this->initializer89091 && ($this->initializer89091->__invoke($valueHolderf1e50, $this, 'refresh', array('entity' => $entity), $this->initializer89091) || 1) && $this->valueHolderf1e50 = $valueHolderf1e50;

        return $this->valueHolderf1e50->refresh($entity);
    }

    public function detach($entity)
    {
        $this->initializer89091 && ($this->initializer89091->__invoke($valueHolderf1e50, $this, 'detach', array('entity' => $entity), $this->initializer89091) || 1) && $this->valueHolderf1e50 = $valueHolderf1e50;

        return $this->valueHolderf1e50->detach($entity);
    }

    public function merge($entity)
    {
        $this->initializer89091 && ($this->initializer89091->__invoke($valueHolderf1e50, $this, 'merge', array('entity' => $entity), $this->initializer89091) || 1) && $this->valueHolderf1e50 = $valueHolderf1e50;

        return $this->valueHolderf1e50->merge($entity);
    }

    public function copy($entity, $deep = false)
    {
        $this->initializer89091 && ($this->initializer89091->__invoke($valueHolderf1e50, $this, 'copy', array('entity' => $entity, 'deep' => $deep), $this->initializer89091) || 1) && $this->valueHolderf1e50 = $valueHolderf1e50;

        return $this->valueHolderf1e50->copy($entity, $deep);
    }

    public function lock($entity, $lockMode, $lockVersion = null)
    {
        $this->initializer89091 && ($this->initializer89091->__invoke($valueHolderf1e50, $this, 'lock', array('entity' => $entity, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializer89091) || 1) && $this->valueHolderf1e50 = $valueHolderf1e50;

        return $this->valueHolderf1e50->lock($entity, $lockMode, $lockVersion);
    }

    public function getRepository($entityName)
    {
        $this->initializer89091 && ($this->initializer89091->__invoke($valueHolderf1e50, $this, 'getRepository', array('entityName' => $entityName), $this->initializer89091) || 1) && $this->valueHolderf1e50 = $valueHolderf1e50;

        return $this->valueHolderf1e50->getRepository($entityName);
    }

    public function contains($entity)
    {
        $this->initializer89091 && ($this->initializer89091->__invoke($valueHolderf1e50, $this, 'contains', array('entity' => $entity), $this->initializer89091) || 1) && $this->valueHolderf1e50 = $valueHolderf1e50;

        return $this->valueHolderf1e50->contains($entity);
    }

    public function getEventManager()
    {
        $this->initializer89091 && ($this->initializer89091->__invoke($valueHolderf1e50, $this, 'getEventManager', array(), $this->initializer89091) || 1) && $this->valueHolderf1e50 = $valueHolderf1e50;

        return $this->valueHolderf1e50->getEventManager();
    }

    public function getConfiguration()
    {
        $this->initializer89091 && ($this->initializer89091->__invoke($valueHolderf1e50, $this, 'getConfiguration', array(), $this->initializer89091) || 1) && $this->valueHolderf1e50 = $valueHolderf1e50;

        return $this->valueHolderf1e50->getConfiguration();
    }

    public function isOpen()
    {
        $this->initializer89091 && ($this->initializer89091->__invoke($valueHolderf1e50, $this, 'isOpen', array(), $this->initializer89091) || 1) && $this->valueHolderf1e50 = $valueHolderf1e50;

        return $this->valueHolderf1e50->isOpen();
    }

    public function getUnitOfWork()
    {
        $this->initializer89091 && ($this->initializer89091->__invoke($valueHolderf1e50, $this, 'getUnitOfWork', array(), $this->initializer89091) || 1) && $this->valueHolderf1e50 = $valueHolderf1e50;

        return $this->valueHolderf1e50->getUnitOfWork();
    }

    public function getHydrator($hydrationMode)
    {
        $this->initializer89091 && ($this->initializer89091->__invoke($valueHolderf1e50, $this, 'getHydrator', array('hydrationMode' => $hydrationMode), $this->initializer89091) || 1) && $this->valueHolderf1e50 = $valueHolderf1e50;

        return $this->valueHolderf1e50->getHydrator($hydrationMode);
    }

    public function newHydrator($hydrationMode)
    {
        $this->initializer89091 && ($this->initializer89091->__invoke($valueHolderf1e50, $this, 'newHydrator', array('hydrationMode' => $hydrationMode), $this->initializer89091) || 1) && $this->valueHolderf1e50 = $valueHolderf1e50;

        return $this->valueHolderf1e50->newHydrator($hydrationMode);
    }

    public function getProxyFactory()
    {
        $this->initializer89091 && ($this->initializer89091->__invoke($valueHolderf1e50, $this, 'getProxyFactory', array(), $this->initializer89091) || 1) && $this->valueHolderf1e50 = $valueHolderf1e50;

        return $this->valueHolderf1e50->getProxyFactory();
    }

    public function initializeObject($obj)
    {
        $this->initializer89091 && ($this->initializer89091->__invoke($valueHolderf1e50, $this, 'initializeObject', array('obj' => $obj), $this->initializer89091) || 1) && $this->valueHolderf1e50 = $valueHolderf1e50;

        return $this->valueHolderf1e50->initializeObject($obj);
    }

    public function getFilters()
    {
        $this->initializer89091 && ($this->initializer89091->__invoke($valueHolderf1e50, $this, 'getFilters', array(), $this->initializer89091) || 1) && $this->valueHolderf1e50 = $valueHolderf1e50;

        return $this->valueHolderf1e50->getFilters();
    }

    public function isFiltersStateClean()
    {
        $this->initializer89091 && ($this->initializer89091->__invoke($valueHolderf1e50, $this, 'isFiltersStateClean', array(), $this->initializer89091) || 1) && $this->valueHolderf1e50 = $valueHolderf1e50;

        return $this->valueHolderf1e50->isFiltersStateClean();
    }

    public function hasFilters()
    {
        $this->initializer89091 && ($this->initializer89091->__invoke($valueHolderf1e50, $this, 'hasFilters', array(), $this->initializer89091) || 1) && $this->valueHolderf1e50 = $valueHolderf1e50;

        return $this->valueHolderf1e50->hasFilters();
    }

    /**
     * Constructor for lazy initialization
     *
     * @param \Closure|null $initializer
     */
    public static function staticProxyConstructor($initializer)
    {
        static $reflection;

        $reflection = $reflection ?? new \ReflectionClass(__CLASS__);
        $instance   = $reflection->newInstanceWithoutConstructor();

        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $instance, 'Doctrine\\ORM\\EntityManager')->__invoke($instance);

        $instance->initializer89091 = $initializer;

        return $instance;
    }

    protected function __construct(\Doctrine\DBAL\Connection $conn, \Doctrine\ORM\Configuration $config, \Doctrine\Common\EventManager $eventManager)
    {
        static $reflection;

        if (! $this->valueHolderf1e50) {
            $reflection = $reflection ?? new \ReflectionClass('Doctrine\\ORM\\EntityManager');
            $this->valueHolderf1e50 = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);

        }

        $this->valueHolderf1e50->__construct($conn, $config, $eventManager);
    }

    public function & __get($name)
    {
        $this->initializer89091 && ($this->initializer89091->__invoke($valueHolderf1e50, $this, '__get', ['name' => $name], $this->initializer89091) || 1) && $this->valueHolderf1e50 = $valueHolderf1e50;

        if (isset(self::$publicProperties0c4ad[$name])) {
            return $this->valueHolderf1e50->$name;
        }

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolderf1e50;

            $backtrace = debug_backtrace(false, 1);
            trigger_error(
                sprintf(
                    'Undefined property: %s::$%s in %s on line %s',
                    $realInstanceReflection->getName(),
                    $name,
                    $backtrace[0]['file'],
                    $backtrace[0]['line']
                ),
                \E_USER_NOTICE
            );
            return $targetObject->$name;
        }

        $targetObject = $this->valueHolderf1e50;
        $accessor = function & () use ($targetObject, $name) {
            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    public function __set($name, $value)
    {
        $this->initializer89091 && ($this->initializer89091->__invoke($valueHolderf1e50, $this, '__set', array('name' => $name, 'value' => $value), $this->initializer89091) || 1) && $this->valueHolderf1e50 = $valueHolderf1e50;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolderf1e50;

            $targetObject->$name = $value;

            return $targetObject->$name;
        }

        $targetObject = $this->valueHolderf1e50;
        $accessor = function & () use ($targetObject, $name, $value) {
            $targetObject->$name = $value;

            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    public function __isset($name)
    {
        $this->initializer89091 && ($this->initializer89091->__invoke($valueHolderf1e50, $this, '__isset', array('name' => $name), $this->initializer89091) || 1) && $this->valueHolderf1e50 = $valueHolderf1e50;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolderf1e50;

            return isset($targetObject->$name);
        }

        $targetObject = $this->valueHolderf1e50;
        $accessor = function () use ($targetObject, $name) {
            return isset($targetObject->$name);
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();

        return $returnValue;
    }

    public function __unset($name)
    {
        $this->initializer89091 && ($this->initializer89091->__invoke($valueHolderf1e50, $this, '__unset', array('name' => $name), $this->initializer89091) || 1) && $this->valueHolderf1e50 = $valueHolderf1e50;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolderf1e50;

            unset($targetObject->$name);

            return;
        }

        $targetObject = $this->valueHolderf1e50;
        $accessor = function () use ($targetObject, $name) {
            unset($targetObject->$name);

            return;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $accessor();
    }

    public function __clone()
    {
        $this->initializer89091 && ($this->initializer89091->__invoke($valueHolderf1e50, $this, '__clone', array(), $this->initializer89091) || 1) && $this->valueHolderf1e50 = $valueHolderf1e50;

        $this->valueHolderf1e50 = clone $this->valueHolderf1e50;
    }

    public function __sleep()
    {
        $this->initializer89091 && ($this->initializer89091->__invoke($valueHolderf1e50, $this, '__sleep', array(), $this->initializer89091) || 1) && $this->valueHolderf1e50 = $valueHolderf1e50;

        return array('valueHolderf1e50');
    }

    public function __wakeup()
    {
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);
    }

    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializer89091 = $initializer;
    }

    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializer89091;
    }

    public function initializeProxy() : bool
    {
        return $this->initializer89091 && ($this->initializer89091->__invoke($valueHolderf1e50, $this, 'initializeProxy', array(), $this->initializer89091) || 1) && $this->valueHolderf1e50 = $valueHolderf1e50;
    }

    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolderf1e50;
    }

    public function getWrappedValueHolderValue()
    {
        return $this->valueHolderf1e50;
    }
}

if (!\class_exists('EntityManager_9a5be93', false)) {
    \class_alias(__NAMESPACE__.'\\EntityManager_9a5be93', 'EntityManager_9a5be93', false);
}
