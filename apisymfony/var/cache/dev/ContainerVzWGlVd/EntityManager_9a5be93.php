<?php

namespace ContainerVzWGlVd;
include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'doctrine'.\DIRECTORY_SEPARATOR.'persistence'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Persistence'.\DIRECTORY_SEPARATOR.'ObjectManager.php';
include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'doctrine'.\DIRECTORY_SEPARATOR.'orm'.\DIRECTORY_SEPARATOR.'lib'.\DIRECTORY_SEPARATOR.'Doctrine'.\DIRECTORY_SEPARATOR.'ORM'.\DIRECTORY_SEPARATOR.'EntityManagerInterface.php';
include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'doctrine'.\DIRECTORY_SEPARATOR.'orm'.\DIRECTORY_SEPARATOR.'lib'.\DIRECTORY_SEPARATOR.'Doctrine'.\DIRECTORY_SEPARATOR.'ORM'.\DIRECTORY_SEPARATOR.'EntityManager.php';

class EntityManager_9a5be93 extends \Doctrine\ORM\EntityManager implements \ProxyManager\Proxy\VirtualProxyInterface
{
    /**
     * @var \Doctrine\ORM\EntityManager|null wrapped object, if the proxy is initialized
     */
    private $valueHolderc2a57 = null;

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $initializer84733 = null;

    /**
     * @var bool[] map of public properties of the parent class
     */
    private static $publicProperties100c1 = [
        
    ];

    public function getConnection()
    {
        $this->initializer84733 && ($this->initializer84733->__invoke($valueHolderc2a57, $this, 'getConnection', array(), $this->initializer84733) || 1) && $this->valueHolderc2a57 = $valueHolderc2a57;

        return $this->valueHolderc2a57->getConnection();
    }

    public function getMetadataFactory()
    {
        $this->initializer84733 && ($this->initializer84733->__invoke($valueHolderc2a57, $this, 'getMetadataFactory', array(), $this->initializer84733) || 1) && $this->valueHolderc2a57 = $valueHolderc2a57;

        return $this->valueHolderc2a57->getMetadataFactory();
    }

    public function getExpressionBuilder()
    {
        $this->initializer84733 && ($this->initializer84733->__invoke($valueHolderc2a57, $this, 'getExpressionBuilder', array(), $this->initializer84733) || 1) && $this->valueHolderc2a57 = $valueHolderc2a57;

        return $this->valueHolderc2a57->getExpressionBuilder();
    }

    public function beginTransaction()
    {
        $this->initializer84733 && ($this->initializer84733->__invoke($valueHolderc2a57, $this, 'beginTransaction', array(), $this->initializer84733) || 1) && $this->valueHolderc2a57 = $valueHolderc2a57;

        return $this->valueHolderc2a57->beginTransaction();
    }

    public function getCache()
    {
        $this->initializer84733 && ($this->initializer84733->__invoke($valueHolderc2a57, $this, 'getCache', array(), $this->initializer84733) || 1) && $this->valueHolderc2a57 = $valueHolderc2a57;

        return $this->valueHolderc2a57->getCache();
    }

    public function transactional($func)
    {
        $this->initializer84733 && ($this->initializer84733->__invoke($valueHolderc2a57, $this, 'transactional', array('func' => $func), $this->initializer84733) || 1) && $this->valueHolderc2a57 = $valueHolderc2a57;

        return $this->valueHolderc2a57->transactional($func);
    }

    public function wrapInTransaction(callable $func)
    {
        $this->initializer84733 && ($this->initializer84733->__invoke($valueHolderc2a57, $this, 'wrapInTransaction', array('func' => $func), $this->initializer84733) || 1) && $this->valueHolderc2a57 = $valueHolderc2a57;

        return $this->valueHolderc2a57->wrapInTransaction($func);
    }

    public function commit()
    {
        $this->initializer84733 && ($this->initializer84733->__invoke($valueHolderc2a57, $this, 'commit', array(), $this->initializer84733) || 1) && $this->valueHolderc2a57 = $valueHolderc2a57;

        return $this->valueHolderc2a57->commit();
    }

    public function rollback()
    {
        $this->initializer84733 && ($this->initializer84733->__invoke($valueHolderc2a57, $this, 'rollback', array(), $this->initializer84733) || 1) && $this->valueHolderc2a57 = $valueHolderc2a57;

        return $this->valueHolderc2a57->rollback();
    }

    public function getClassMetadata($className)
    {
        $this->initializer84733 && ($this->initializer84733->__invoke($valueHolderc2a57, $this, 'getClassMetadata', array('className' => $className), $this->initializer84733) || 1) && $this->valueHolderc2a57 = $valueHolderc2a57;

        return $this->valueHolderc2a57->getClassMetadata($className);
    }

    public function createQuery($dql = '')
    {
        $this->initializer84733 && ($this->initializer84733->__invoke($valueHolderc2a57, $this, 'createQuery', array('dql' => $dql), $this->initializer84733) || 1) && $this->valueHolderc2a57 = $valueHolderc2a57;

        return $this->valueHolderc2a57->createQuery($dql);
    }

    public function createNamedQuery($name)
    {
        $this->initializer84733 && ($this->initializer84733->__invoke($valueHolderc2a57, $this, 'createNamedQuery', array('name' => $name), $this->initializer84733) || 1) && $this->valueHolderc2a57 = $valueHolderc2a57;

        return $this->valueHolderc2a57->createNamedQuery($name);
    }

    public function createNativeQuery($sql, \Doctrine\ORM\Query\ResultSetMapping $rsm)
    {
        $this->initializer84733 && ($this->initializer84733->__invoke($valueHolderc2a57, $this, 'createNativeQuery', array('sql' => $sql, 'rsm' => $rsm), $this->initializer84733) || 1) && $this->valueHolderc2a57 = $valueHolderc2a57;

        return $this->valueHolderc2a57->createNativeQuery($sql, $rsm);
    }

    public function createNamedNativeQuery($name)
    {
        $this->initializer84733 && ($this->initializer84733->__invoke($valueHolderc2a57, $this, 'createNamedNativeQuery', array('name' => $name), $this->initializer84733) || 1) && $this->valueHolderc2a57 = $valueHolderc2a57;

        return $this->valueHolderc2a57->createNamedNativeQuery($name);
    }

    public function createQueryBuilder()
    {
        $this->initializer84733 && ($this->initializer84733->__invoke($valueHolderc2a57, $this, 'createQueryBuilder', array(), $this->initializer84733) || 1) && $this->valueHolderc2a57 = $valueHolderc2a57;

        return $this->valueHolderc2a57->createQueryBuilder();
    }

    public function flush($entity = null)
    {
        $this->initializer84733 && ($this->initializer84733->__invoke($valueHolderc2a57, $this, 'flush', array('entity' => $entity), $this->initializer84733) || 1) && $this->valueHolderc2a57 = $valueHolderc2a57;

        return $this->valueHolderc2a57->flush($entity);
    }

    public function find($className, $id, $lockMode = null, $lockVersion = null)
    {
        $this->initializer84733 && ($this->initializer84733->__invoke($valueHolderc2a57, $this, 'find', array('className' => $className, 'id' => $id, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializer84733) || 1) && $this->valueHolderc2a57 = $valueHolderc2a57;

        return $this->valueHolderc2a57->find($className, $id, $lockMode, $lockVersion);
    }

    public function getReference($entityName, $id)
    {
        $this->initializer84733 && ($this->initializer84733->__invoke($valueHolderc2a57, $this, 'getReference', array('entityName' => $entityName, 'id' => $id), $this->initializer84733) || 1) && $this->valueHolderc2a57 = $valueHolderc2a57;

        return $this->valueHolderc2a57->getReference($entityName, $id);
    }

    public function getPartialReference($entityName, $identifier)
    {
        $this->initializer84733 && ($this->initializer84733->__invoke($valueHolderc2a57, $this, 'getPartialReference', array('entityName' => $entityName, 'identifier' => $identifier), $this->initializer84733) || 1) && $this->valueHolderc2a57 = $valueHolderc2a57;

        return $this->valueHolderc2a57->getPartialReference($entityName, $identifier);
    }

    public function clear($entityName = null)
    {
        $this->initializer84733 && ($this->initializer84733->__invoke($valueHolderc2a57, $this, 'clear', array('entityName' => $entityName), $this->initializer84733) || 1) && $this->valueHolderc2a57 = $valueHolderc2a57;

        return $this->valueHolderc2a57->clear($entityName);
    }

    public function close()
    {
        $this->initializer84733 && ($this->initializer84733->__invoke($valueHolderc2a57, $this, 'close', array(), $this->initializer84733) || 1) && $this->valueHolderc2a57 = $valueHolderc2a57;

        return $this->valueHolderc2a57->close();
    }

    public function persist($entity)
    {
        $this->initializer84733 && ($this->initializer84733->__invoke($valueHolderc2a57, $this, 'persist', array('entity' => $entity), $this->initializer84733) || 1) && $this->valueHolderc2a57 = $valueHolderc2a57;

        return $this->valueHolderc2a57->persist($entity);
    }

    public function remove($entity)
    {
        $this->initializer84733 && ($this->initializer84733->__invoke($valueHolderc2a57, $this, 'remove', array('entity' => $entity), $this->initializer84733) || 1) && $this->valueHolderc2a57 = $valueHolderc2a57;

        return $this->valueHolderc2a57->remove($entity);
    }

    public function refresh($entity)
    {
        $this->initializer84733 && ($this->initializer84733->__invoke($valueHolderc2a57, $this, 'refresh', array('entity' => $entity), $this->initializer84733) || 1) && $this->valueHolderc2a57 = $valueHolderc2a57;

        return $this->valueHolderc2a57->refresh($entity);
    }

    public function detach($entity)
    {
        $this->initializer84733 && ($this->initializer84733->__invoke($valueHolderc2a57, $this, 'detach', array('entity' => $entity), $this->initializer84733) || 1) && $this->valueHolderc2a57 = $valueHolderc2a57;

        return $this->valueHolderc2a57->detach($entity);
    }

    public function merge($entity)
    {
        $this->initializer84733 && ($this->initializer84733->__invoke($valueHolderc2a57, $this, 'merge', array('entity' => $entity), $this->initializer84733) || 1) && $this->valueHolderc2a57 = $valueHolderc2a57;

        return $this->valueHolderc2a57->merge($entity);
    }

    public function copy($entity, $deep = false)
    {
        $this->initializer84733 && ($this->initializer84733->__invoke($valueHolderc2a57, $this, 'copy', array('entity' => $entity, 'deep' => $deep), $this->initializer84733) || 1) && $this->valueHolderc2a57 = $valueHolderc2a57;

        return $this->valueHolderc2a57->copy($entity, $deep);
    }

    public function lock($entity, $lockMode, $lockVersion = null)
    {
        $this->initializer84733 && ($this->initializer84733->__invoke($valueHolderc2a57, $this, 'lock', array('entity' => $entity, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializer84733) || 1) && $this->valueHolderc2a57 = $valueHolderc2a57;

        return $this->valueHolderc2a57->lock($entity, $lockMode, $lockVersion);
    }

    public function getRepository($entityName)
    {
        $this->initializer84733 && ($this->initializer84733->__invoke($valueHolderc2a57, $this, 'getRepository', array('entityName' => $entityName), $this->initializer84733) || 1) && $this->valueHolderc2a57 = $valueHolderc2a57;

        return $this->valueHolderc2a57->getRepository($entityName);
    }

    public function contains($entity)
    {
        $this->initializer84733 && ($this->initializer84733->__invoke($valueHolderc2a57, $this, 'contains', array('entity' => $entity), $this->initializer84733) || 1) && $this->valueHolderc2a57 = $valueHolderc2a57;

        return $this->valueHolderc2a57->contains($entity);
    }

    public function getEventManager()
    {
        $this->initializer84733 && ($this->initializer84733->__invoke($valueHolderc2a57, $this, 'getEventManager', array(), $this->initializer84733) || 1) && $this->valueHolderc2a57 = $valueHolderc2a57;

        return $this->valueHolderc2a57->getEventManager();
    }

    public function getConfiguration()
    {
        $this->initializer84733 && ($this->initializer84733->__invoke($valueHolderc2a57, $this, 'getConfiguration', array(), $this->initializer84733) || 1) && $this->valueHolderc2a57 = $valueHolderc2a57;

        return $this->valueHolderc2a57->getConfiguration();
    }

    public function isOpen()
    {
        $this->initializer84733 && ($this->initializer84733->__invoke($valueHolderc2a57, $this, 'isOpen', array(), $this->initializer84733) || 1) && $this->valueHolderc2a57 = $valueHolderc2a57;

        return $this->valueHolderc2a57->isOpen();
    }

    public function getUnitOfWork()
    {
        $this->initializer84733 && ($this->initializer84733->__invoke($valueHolderc2a57, $this, 'getUnitOfWork', array(), $this->initializer84733) || 1) && $this->valueHolderc2a57 = $valueHolderc2a57;

        return $this->valueHolderc2a57->getUnitOfWork();
    }

    public function getHydrator($hydrationMode)
    {
        $this->initializer84733 && ($this->initializer84733->__invoke($valueHolderc2a57, $this, 'getHydrator', array('hydrationMode' => $hydrationMode), $this->initializer84733) || 1) && $this->valueHolderc2a57 = $valueHolderc2a57;

        return $this->valueHolderc2a57->getHydrator($hydrationMode);
    }

    public function newHydrator($hydrationMode)
    {
        $this->initializer84733 && ($this->initializer84733->__invoke($valueHolderc2a57, $this, 'newHydrator', array('hydrationMode' => $hydrationMode), $this->initializer84733) || 1) && $this->valueHolderc2a57 = $valueHolderc2a57;

        return $this->valueHolderc2a57->newHydrator($hydrationMode);
    }

    public function getProxyFactory()
    {
        $this->initializer84733 && ($this->initializer84733->__invoke($valueHolderc2a57, $this, 'getProxyFactory', array(), $this->initializer84733) || 1) && $this->valueHolderc2a57 = $valueHolderc2a57;

        return $this->valueHolderc2a57->getProxyFactory();
    }

    public function initializeObject($obj)
    {
        $this->initializer84733 && ($this->initializer84733->__invoke($valueHolderc2a57, $this, 'initializeObject', array('obj' => $obj), $this->initializer84733) || 1) && $this->valueHolderc2a57 = $valueHolderc2a57;

        return $this->valueHolderc2a57->initializeObject($obj);
    }

    public function getFilters()
    {
        $this->initializer84733 && ($this->initializer84733->__invoke($valueHolderc2a57, $this, 'getFilters', array(), $this->initializer84733) || 1) && $this->valueHolderc2a57 = $valueHolderc2a57;

        return $this->valueHolderc2a57->getFilters();
    }

    public function isFiltersStateClean()
    {
        $this->initializer84733 && ($this->initializer84733->__invoke($valueHolderc2a57, $this, 'isFiltersStateClean', array(), $this->initializer84733) || 1) && $this->valueHolderc2a57 = $valueHolderc2a57;

        return $this->valueHolderc2a57->isFiltersStateClean();
    }

    public function hasFilters()
    {
        $this->initializer84733 && ($this->initializer84733->__invoke($valueHolderc2a57, $this, 'hasFilters', array(), $this->initializer84733) || 1) && $this->valueHolderc2a57 = $valueHolderc2a57;

        return $this->valueHolderc2a57->hasFilters();
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

        $instance->initializer84733 = $initializer;

        return $instance;
    }

    protected function __construct(\Doctrine\DBAL\Connection $conn, \Doctrine\ORM\Configuration $config, \Doctrine\Common\EventManager $eventManager)
    {
        static $reflection;

        if (! $this->valueHolderc2a57) {
            $reflection = $reflection ?? new \ReflectionClass('Doctrine\\ORM\\EntityManager');
            $this->valueHolderc2a57 = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);

        }

        $this->valueHolderc2a57->__construct($conn, $config, $eventManager);
    }

    public function & __get($name)
    {
        $this->initializer84733 && ($this->initializer84733->__invoke($valueHolderc2a57, $this, '__get', ['name' => $name], $this->initializer84733) || 1) && $this->valueHolderc2a57 = $valueHolderc2a57;

        if (isset(self::$publicProperties100c1[$name])) {
            return $this->valueHolderc2a57->$name;
        }

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolderc2a57;

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

        $targetObject = $this->valueHolderc2a57;
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
        $this->initializer84733 && ($this->initializer84733->__invoke($valueHolderc2a57, $this, '__set', array('name' => $name, 'value' => $value), $this->initializer84733) || 1) && $this->valueHolderc2a57 = $valueHolderc2a57;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolderc2a57;

            $targetObject->$name = $value;

            return $targetObject->$name;
        }

        $targetObject = $this->valueHolderc2a57;
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
        $this->initializer84733 && ($this->initializer84733->__invoke($valueHolderc2a57, $this, '__isset', array('name' => $name), $this->initializer84733) || 1) && $this->valueHolderc2a57 = $valueHolderc2a57;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolderc2a57;

            return isset($targetObject->$name);
        }

        $targetObject = $this->valueHolderc2a57;
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
        $this->initializer84733 && ($this->initializer84733->__invoke($valueHolderc2a57, $this, '__unset', array('name' => $name), $this->initializer84733) || 1) && $this->valueHolderc2a57 = $valueHolderc2a57;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolderc2a57;

            unset($targetObject->$name);

            return;
        }

        $targetObject = $this->valueHolderc2a57;
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
        $this->initializer84733 && ($this->initializer84733->__invoke($valueHolderc2a57, $this, '__clone', array(), $this->initializer84733) || 1) && $this->valueHolderc2a57 = $valueHolderc2a57;

        $this->valueHolderc2a57 = clone $this->valueHolderc2a57;
    }

    public function __sleep()
    {
        $this->initializer84733 && ($this->initializer84733->__invoke($valueHolderc2a57, $this, '__sleep', array(), $this->initializer84733) || 1) && $this->valueHolderc2a57 = $valueHolderc2a57;

        return array('valueHolderc2a57');
    }

    public function __wakeup()
    {
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);
    }

    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializer84733 = $initializer;
    }

    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializer84733;
    }

    public function initializeProxy() : bool
    {
        return $this->initializer84733 && ($this->initializer84733->__invoke($valueHolderc2a57, $this, 'initializeProxy', array(), $this->initializer84733) || 1) && $this->valueHolderc2a57 = $valueHolderc2a57;
    }

    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolderc2a57;
    }

    public function getWrappedValueHolderValue()
    {
        return $this->valueHolderc2a57;
    }
}

if (!\class_exists('EntityManager_9a5be93', false)) {
    \class_alias(__NAMESPACE__.'\\EntityManager_9a5be93', 'EntityManager_9a5be93', false);
}
