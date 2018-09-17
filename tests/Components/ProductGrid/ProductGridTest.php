<?php

namespace MageSuite\ContentConstructor\Tests\Components\ProductGrid;

class ProductGridTest extends \PHPUnit\Framework\TestCase
{
    protected $mediaResolverStub;

    protected $urlResolverStub;

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
    private $productGrid;

    /**
     * @var \MageSuite\ContentConstructor\Components\ProductCarousel\DataProvider|\PHPUnit_Framework_MockObject_MockObject
     */
    private $dataProviderStub;


    public function setUp()
    {
        $this->templateStub = $this->getMockBuilder(\MageSuite\ContentConstructor\View\Template::class)->getMock();
        $this->locatorStub = $this->getMockBuilder(\MageSuite\ContentConstructor\View\TemplateLocator::class)->getMock();
        $this->dataProviderStub = $this->getMockBuilder(\MageSuite\ContentConstructor\Components\ProductCarousel\DataProvider::class)->getMock();
        $this->mediaResolverStub = $this->getMockBuilder(\MageSuite\ContentConstructor\Service\MediaResolver::class)->getMock();
        $this->urlResolverStub = $this->getMockBuilder(\MageSuite\ContentConstructor\Service\UrlResolver::class)->getMock();

        $this->productGrid = new \MageSuite\ContentConstructor\Components\ProductGrid\ProductGrid(
            $this->templateStub,
            $this->locatorStub,
            $this->dataProviderStub,
            $this->mediaResolverStub,
            $this->urlResolverStub
        );
    }

    public function testItImplementsComponentInterface()
    {
        $this->assertInstanceOf(\MageSuite\ContentConstructor\Component::class, $this->productGrid);
    }

    public function testItRendersTemplate() {
        $componentConfiguration = [];

        $this->locatorStub
            ->method('locate')
            ->willReturn('');

        $this->templateStub
            ->method('render')
            ->willReturn('some_value');

        $this->dataProviderStub
            ->method('getProducts')
            ->willReturn([]);

        $this->assertEquals(
            'some_value',
            $this->productGrid->render($componentConfiguration)
        );
    }
}