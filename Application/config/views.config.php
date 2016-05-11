<?php
return [
  'view_manager' => [
    'display_not_found_reason' => true,
    'display_exceptions' => true,
    'doctype' => 'HTML5',
    'not_found_template' => 'error/404',
    'exception_template' => 'error/index',
    'template_map' => [
      'layout/layout' => './application/view/layout/layout.phtml',
      'error/404' => './application/view/error/404.phtml',
      'error/index' => './application/view/error/index.phtml',
    ],
    'template_path_stack' => [
      './application/view',
    ],
  ],
];