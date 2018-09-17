<?php

namespace MageSuite\ContentConstructor\Tests\Components\ProductCarousel;

class ProductCarouselTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \MageSuite\ContentConstructor\View\Template|\PHPUnit_Framework_MockObject_MockObject
     */
    private $templateStub;

    /**
     * @var \MageSuite\ContentConstructor\View\TemplateLocator|\PHPUnit_Framework_MockObject_MockObject
     */
    private $locatorStub;

    /**
     * @var \MageSuite\ContentConstructor\Components\ProductCarousel\ProductCarousel
     */
    private $productCarousel;

    /**
     * @var \MageSuite\ContentConstructor\Components\Navigation\DataProvider|\PHPUnit_Framework_MockObject_MockObject
     */
    private $dataProviderStub;


    public function setUp()
    {
        $this->templateStub = $this->getMockBuilder(\MageSuite\ContentConstructor\View\Template::class)->getMock();
        $this->locatorStub = $this->getMockBuilder(\MageSuite\ContentConstructor\View\TemplateLocator::class)->getMock();
        $this->dataProviderStub = $this->getMockBuilder(\MageSuite\ContentConstructor\Components\ProductCarousel\DataProvider::class)->getMock();

        $this->productCarousel = new \MageSuite\ContentConstructor\Components\ProductCarousel\ProductCarousel(
            $this->templateStub,
            $this->locatorStub,
            $this->dataProviderStub
        );
    }

    public function testItImplementsComponentInterface()
    {
        $this->assertInstanceOf(\MageSuite\ContentConstructor\Component::class, $this->productCarousel);
    }

    public function testItRendersTemplate() {
        $componentConfiguration = [];

        $this->locatorStub
            ->method('locate')
            ->willReturn('');

        $this->templateStub
            ->method('render')
            ->willReturn('some_value');

        $this->assertEquals(
            'some_value',
            $this->productCarousel->render($componentConfiguration)
        );
    }
}