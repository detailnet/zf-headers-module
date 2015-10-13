<?php

namespace Detail\Headers\Factory\Options;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

use Detail\Headers\Exception\ConfigException;
use Detail\Headers\Options\ModuleOptions;

class ModuleOptionsFactory implements
    FactoryInterface
{
    /**
     * {@inheritDoc}
     * @return ModuleOptions
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('Config');

        if (!isset($config['detail_headers'])) {
            throw new ConfigException('Config for Detail\Headers is not set');
        }

        return new ModuleOptions($config['detail_headers']);
    }
}
