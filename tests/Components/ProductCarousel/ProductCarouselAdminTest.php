<?php

namespace MageSuite\ContentConstructor\Tests\Components\ProductCarousel;

class ProductCarouselAdminTest extends \PHPUnit\Framework\TestCase
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
    private $headline;

    private $categoryPickerProviderStub;


    public function setUp()
    {
        $this->templateMock = $this->getMockBuilder(\MageSuite\ContentConstructor\View\Template::class)->getMock();
        $this->locatorMock = $this->getMockBuilder(\MageSuite\ContentConstructor\View\AdminTemplateLocator::class)->getMock();
        $this->categoryPickerProviderStub = $this->getMockBuilder(\MageSuite\ContentConstructor\Components\ProductCarousel\CategoryPickerProvider::class)->getMock();

        $this->headline = new \MageSuite\ContentConstructor\Components\ProductCarousel\ProductCarouselAdmin(
            $this->templateMock,
            $this->locatorMock,
            $this->categoryPickerProviderStub
        );
    }

    public function testItImplementsAdminComponentInterface() {
        $this->assertInstanceOf(\MageSuite\ContentConstructor\AdminComponent::class,$this->headline);
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
            $this->headline->renderConfigurator()
        );
    }
}