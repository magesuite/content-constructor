<?php

namespace MageSuite\ContentConstructor\Tests;

class ComponentManagerTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \MageSuite\ContentConstructor\Factory\AdminComponentFactory|\PHPUnit_Framework_MockObject_MockObject
     */

    private $adminComponentFactoryStub;
    /**
     * @var \MageSuite\ContentConstructor\Repository\ComponentsConfigurationRepository|\PHPUnit_Framework_MockObject_MockObject
     */
    private $componentConfigurationRepositoryStub;
    /**
     * @var \MageSuite\ContentConstructor\ComponentManager
     */
    private $manager;

    /**
     * @var \MageSuite\ContentConstructor\AdminComponent|\PHPUnit_Framework_MockObject_MockObject
     */
    private $adminComponentStub;

    public function setUp(): void {
        $this->adminComponentFactoryStub = $this
            ->getMockBuilder(\MageSuite\ContentConstructor\Factory\AdminComponentFactory::class)->getMock();
        $this->componentConfigurationRepositoryStub = $this
            ->getMockBuilder(\MageSuite\ContentConstructor\Repository\ComponentsConfigurationRepository::class)->getMock();

        $this->manager = new \MageSuite\ContentConstructor\ComponentManager(
            $this->adminComponentFactoryStub,
            $this->componentConfigurationRepositoryStub
        );

        $this->adminComponentStub = $this->getMockBuilder(\MageSuite\ContentConstructor\AdminComponent::class)->getMock();
    }

    public function testItRendersConfigurationView() {
        $this->adminComponentFactoryStub->method('create')->with('headline')->willReturn($this->adminComponentStub);

        $this->adminComponentStub->method('renderConfigurator')->willReturn('configurator_content');

        $this->assertEquals(
            'configurator_content',
            $this->manager->initializeComponent('headline')->renderConfigurator()
        );
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testItThrowsExceptionWhenComponentDoesNotExists() {
        $this->adminComponentFactoryStub->method('create')->willReturn(null);

        $this->manager->initializeComponent('not_existing_component');
    }
}
