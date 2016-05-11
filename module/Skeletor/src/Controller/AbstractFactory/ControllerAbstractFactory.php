<?php
/**
 * Created by PhpStorm.
 * User: GeeH
 * Date: 10/05/2016
 * Time: 11:38
 */

namespace Skeletor\Controller\AbstractFactory;


use Interop\Container\ContainerInterface;
use Skeletor\Controller\SkeletorAbstractController;
use Zend\Mvc\Exception\InvalidControllerException;
use Zend\ServiceManager\Factory\AbstractFactoryInterface;

class ControllerAbstractFactory implements AbstractFactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $createdClass = new $requestedName();
        if (!($createdClass instanceof SkeletorAbstractController)) {
            throw new InvalidControllerException('ControllerAbstractFactory can only create controllers that extend the SkeletorAbstractController');
        }

        return $createdClass;
    }


    public function canCreate(ContainerInterface $container, $requestedName)
    {
        // matches anything with Controller as part of the namespace,
        // controllers should be Application\Controller\Name
        return preg_match('/\w*\\Controller\\\w*/', $requestedName) === 1;
    }

}