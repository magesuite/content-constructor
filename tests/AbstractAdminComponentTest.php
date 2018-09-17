<?php

namespace MageSuite\ContentConstructor\Tests;


class AbstractAdminComponentTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \MageSuite\ContentConstructor\AbstractAdminComponent
     */
    private $abstractAdminComponent;

    public function setUp()
    {
        $this->abstractAdminComponent = $this->getMockForAbstractClass(\MageSuite\ContentConstructor\AbstractAdminComponent::class);
    }

    public function testDefaultComponentConfigurationIsEmptyArray()
    {
        $this->assertEquals([], $this->abstractAdminComponent->getComponentConfiguration());
    }

    public function testItSetsProperlyConfiguration()
    {
        $componentConfiguration = ['tag' => 'h1', 'main' => 'Main Title'];

        $this->abstractAdminComponent->setComponentConfiguration($componentConfiguration);

        $this->assertEquals($componentConfiguration, $this->abstractAdminComponent->getComponentConfiguration());
    }
}