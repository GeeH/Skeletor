<?php
use Zend\Mvc\Application;

chdir(__DIR__ . '/../');
// Decline static file requests back to the PHP built-in webserver

if (php_sapi_name() === 'cli-server') {
    $path = realpath(__DIR__ . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    if (__FILE__ !== $path && is_file($path)) {
        return false;
    }
    unset($path);
}
// Composer autoloading
require('./vendor/autoload.php');
if (!class_exists(Application::class)) {
    throw new RuntimeException('Unable to load ZF3. Run `php composer.phar install`.');
}

$config = require('Application/config/application.config.php');
$config['service_manager']['factories']['ModuleManager'] = \Skeletor\ModuleManager\SkeletorModuleManagerFactory::class;
// Run the application!
Application::init(
    $config
)->run();