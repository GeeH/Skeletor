<?php
/**
 * Created by PhpStorm.
 * User: GeeH
 * Date: 09/05/2016
 * Time: 12:43
 */

namespace Skeletor\ModuleManager;


use Zend\ModuleManager\Listener\ConfigListener;
use Zend\ModuleManager\ModuleEvent;

class SkeletorConfigListener extends ConfigListener
{
    /**
     * Merge the config for each module
     *
     * @param  ModuleEvent $e
     * @return ConfigListener
     */
    public function onLoadModule(ModuleEvent $e)
    {
        $module = $e->getModule();

        if (is_callable([$module, 'getConfig'])) {
            $config = $module->getConfig();
            $this->addConfig($e->getModuleName(), $config);
            return $this;
        }

        foreach ($this->options->getModulePaths() as $path) {
            $defaultPath = $path . '/' . $e->getModuleName() . '/config/module.config.php';
            if (file_exists($defaultPath)) {
                $this->addConfig($e->getModuleName(), include($defaultPath));
                return $this;
            }
        }

        return $this;
    }
}