<?php
use Zend\Router\Http\Literal;
use Application\Controller\Index;

return [
  'router' => [
    'routes' => [

      'home' => [
        'type' => Literal::class,
        'options' => [
          'route' => '/',
          'defaults' => [
            'controller' => Index::class,
            'action' => 'index',
          ],
        ],
      ],


    ],
  ],
];