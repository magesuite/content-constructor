<?php

namespace MageSuite\ContentConstructor\Tests\Components\HeroCarousel;

class HeroCarouselAdminTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Twig_Environment|\PHPUnit_Framework_MockObject_MockObject
     */
    private $templateStub;

    /**
     * @var \MageSuite\ContentConstructor\View\AdminTemplateLocator|\PHPUnit_Framework_MockObject_MockObject
     */
    private $locatorStub;

    /**
     * @var \MageSuite\ContentConstructor\Components\ProductCarousel\ProductCarouselAdmin
     */
    private $headline;


    public function setUp(): void
    {
        $this->templateStub = $this->getMockBuilder(\MageSuite\ContentConstructor\View\Template::class)->getMock();
        $this->locatorStub = $this->getMockBuilder(\MageSuite\ContentConstructor\View\AdminTemplateLocator::class)->getMock();

        $this->headline = new \MageSuite\ContentConstructor\Components\HeroCarousel\HeroCarouselAdmin(
            $this->templateStub,
            $this->locatorStub
        );
    }

    public function testItImplementsAdminComponentInterface() {
        $this->assertInstanceOf(\MageSuite\ContentConstructor\AdminComponent::class,$this->headline);
    }

    public function testItRendersCorrectTemplate()
    {
        $this->locatorStub
            ->method('locate')
            ->willReturn('/configurator.twig');

        $this->templateStub
            ->method('render')
            ->willReturn('rendered_template');


        $this->assertEquals(
            'rendered_template',
            $this->headline->renderConfigurator()
        );
    }
}
