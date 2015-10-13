<?php

return array(
    'service_manager' => array(
        'abstract_factories' => array(
        ),
        'aliases' => array(
        ),
        'invokables' => array(
            'Detail\Headers\Listener\ContentLengthHeaderListener' => 'Detail\Headers\Listener\ContentLengthHeaderListener',
        ),
        'factories' => array(
            'Detail\Headers\Options\ModuleOptions' => 'Detail\Headers\Factory\Options\ModuleOptionsFactory',
        ),
        'initializers' => array(
        ),
        'shared' => array(
        ),
    ),
    'detail_headers' => array(
        'listeners' => array(
        ),
    ),
);
