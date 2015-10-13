<?php

namespace DetailTest\Headers\Options;

class ModuleOptionsTest extends OptionsTestCase
{
    /**
     * @var \Detail\Headers\Options\ModuleOptions
     */
    protected $options;

    protected function setUp()
    {
        $this->options = $this->getOptions(
            'Detail\Headers\Options\ModuleOptions',
            array(
                'getListeners',
                'setListeners',
            )
        );
    }

    public function testOptionsExist()
    {
        $this->assertInstanceOf('Detail\Headers\Options\ModuleOptions', $this->options);
    }

    public function testListenersCanBeSet()
    {
        $this->assertEquals(array(), $this->options->getListeners());

        $listeners = array('Some\Listener\Class');

        $this->options->setListeners($listeners);

        $this->assertEquals($listeners, $this->options->getListeners());
    }
}
