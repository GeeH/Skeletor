<?php
use Skeletor\Controller\AbstractFactory\ControllerAbstractFactory;
use SkeletorTestAsset\Controller\Invalid;
use SkeletorTestAsset\Controller\Valid;

/**
 * Created by PhpStorm.
 * User: GeeH
 * Date: 10/05/2016
 * Time: 11:51
 */
class ControllerAbstractFactoryTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var ControllerAbstractFactory
     */
    private $abstractFactory;

    public function setUp()
    {
        $this->abstractFactory = new ControllerAbstractFactory();
    }


    public function testCanCreate()
    {
        $container = new \Zend\ServiceManager\ServiceManager([]);
        $this->assertTrue($this->abstractFactory->canCreate($container, 'Application\Controller\Index'));
        $this->assertTrue($this->abstractFactory->canCreate($container, 'My\Controller\Catfish'));

        $this->assertFalse($this->abstractFactory->canCreate($container, 'Application\Controller'));
        $this->assertFalse($this->abstractFactory->canCreate($container, 'Controllers are cool'));
    }

    public function testInvoke()
    {
        $container = new \Zend\ServiceManager\ServiceManager([]);
        $controllerName = Valid::class;
        $generatedClass = $this->abstractFactory->__invoke($container, $controllerName);
        $this->assertInstanceOf($controllerName, $generatedClass);

        $this->expectException(\Zend\Mvc\Exception\InvalidControllerException::class);
        $this->abstractFactory->__invoke($container, Invalid::class);
    }
    
}
