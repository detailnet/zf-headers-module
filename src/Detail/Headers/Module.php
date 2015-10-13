<?php

namespace Detail\Headers;

use Zend\EventManager\ListenerAggregateInterface;
use Zend\Loader\AutoloaderFactory;
use Zend\Loader\StandardAutoloader;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;
use Zend\Mvc\MvcEvent;

class Module implements
    AutoloaderProviderInterface,
    ConfigProviderInterface,
    ServiceProviderInterface
{
    /**
     * @param MvcEvent $event
     */
    public function onBootstrap(MvcEvent $event)
    {
        $this->bootstrapListeners($event);
    }

    /**
     * @param MvcEvent $event
     */
    public function bootstrapListeners(MvcEvent $event)
    {
        /** @var \Zend\ServiceManager\ServiceManager $services */
        $services = $event->getApplication()->getServiceManager();
        $events = $event->getApplication()->getEventManager();

        /** @var Options\ModuleOptions $moduleConfig */
        $moduleConfig = $services->get(Options\ModuleOptions::CLASS);

        // Attach configured listeners
        foreach ($moduleConfig->getListeners() as $listenerClass) {
            /** @var ListenerAggregateInterface $listener */
            $listener = $services->get($listenerClass);

            $events->attachAggregate($listener);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getAutoloaderConfig()
    {
        return array(
            AutoloaderFactory::STANDARD_AUTOLOADER => array(
                StandardAutoloader::LOAD_NS => array(
                    __NAMESPACE__ => __DIR__,
                ),
            ),
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getConfig()
    {
        return include __DIR__ . '/../../../config/module.config.php';
    }

    public function getServiceConfig()
    {
        return array();
    }
}
