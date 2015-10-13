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
                'getAuthorization',
                'setAuthorization',
            )
        );
    }

    public function testOptionsExist()
    {
        $this->assertInstanceOf('Detail\Headers\Options\ModuleOptions', $this->options);
    }

    public function testAuthorizationCanBeSet()
    {
        $this->assertNull($this->options->getAuthorization());

        $this->options->setAuthorization(array());

        $authorization = $this->options->getAuthorization();

        $this->assertInstanceOf('Detail\Headers\Options\Authorization\AuthorizationOptions', $authorization);
    }
}
