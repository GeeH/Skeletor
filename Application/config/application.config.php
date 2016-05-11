<?php

return [
    // This should be an array of module namespaces used in the application.
    'modules' => [
        'Skeletor',
        'Zend\Router',
        'Zend\Validator',
        'Application',
    ],

    // These are various options for the listeners attached to the ModuleManager
    'module_listener_options' => [
        'module_paths' => [
            './vendor',
            './module',
            './',
        ],

        'config_glob_paths' => [
            __DIR__ . '/{{,*.}config,{,*.}global,{,*.}local}.php',
        ],

    ],
];