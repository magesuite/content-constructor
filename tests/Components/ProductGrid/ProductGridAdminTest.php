<?php

namespace MageSuite\ContentConstructor\Tests\Components\ProductGrid;

class ProductGridAdminTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Twig_Environment|\PHPUnit_Framework_MockObject_MockObject
     */
    private $templateMock;

    /**
     * @var \MageSuite\ContentConstructor\View\AdminTemplateLocator|\PHPUnit_Framework_MockObject_MockObject
     */
    private $locatorMock;

    /**
     * @var \MageSuite\ContentConstructor\Components\ProductCarousel\ProductCarouselAdmin
     */
    private $productGrid;


    public function setUp()
    {
        $this->templateMock = $this->getMockBuilder(\MageSuite\ContentConstructor\View\Template::class)->getMock();
        $this->locatorMock = $this->getMockBuilder(\MageSuite\ContentConstructor\View\AdminTemplateLocator::class)->getMock();

        $this->productGrid = new \MageSuite\ContentConstructor\Components\ProductGrid\ProductGridAdmin(
            $this->templateMock,
            $this->locatorMock
        );
    }

    public function testItImplementsAdminComponentInterface() {
        $this->assertInstanceOf(\MageSuite\ContentConstructor\AdminComponent::class,$this->productGrid);
    }

    public function testItRendersCorrectTemplate()
    {
        $this->locatorMock
            ->method('locate')
            ->willReturn('/configurator.twig');

        $this->templateMock
            ->method('render')
            ->willReturn('rendered_template');


        $this->assertEquals(
            'rendered_template',
            $this->productGrid->renderConfigurator()
        );
    }
}
