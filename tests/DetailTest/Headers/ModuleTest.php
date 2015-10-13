<?php

namespace DetailTest\Headers;

use PHPUnit_Framework_TestCase as TestCase;

use Detail\Headers\Module;

class ModuleTest extends TestCase
{
    /**
     * @var Module
     */
    protected $module;

    protected function setUp()
    {
        $this->module = new Module();
    }

    public function testModuleProvidesAutoloaderConfig()
    {
        $config = $this->module->getAutoloaderConfig();

        $this->assertTrue(is_array($config));

        $this->assertArrayHasKey('Zend\Loader\StandardAutoloader', $config);
        $this->assertArrayHasKey('namespaces', $config['Zend\Loader\StandardAutoloader']);
        $this->assertArrayHasKey('Detail\Headers', $config['Zend\Loader\StandardAutoloader']['namespaces']);
    }

    public function testModuleProvidesConfig()
    {
        $config = $this->module->getConfig();

        $this->assertTrue(is_array($config));
        $this->assertArrayHasKey('detail_headers', $config);
        $this->assertTrue(is_array($config['detail_headers']));
    }

    public function testModuleProvidesControllerConfig()
    {
        $config = $this->module->getControllerConfig();

        $this->assertTrue(is_array($config));
    }

    public function testModuleProvidesServiceConfig()
    {
        $config = $this->module->getServiceConfig();

        $this->assertTrue(is_array($config));
    }
}
