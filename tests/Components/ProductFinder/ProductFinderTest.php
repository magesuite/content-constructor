<?php

namespace MageSuite\ContentConstructor\Tests\Components\ProductFinder;

class ProductFinderTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \MageSuite\ContentConstructor\Components\ProductFinder\EndpointUrlProvider
     */
    protected $endpointUrlProviderStub;

    /**
     * @var \MageSuite\ContentConstructor\Service\MediaResolver
     */
    protected $mediaResolverStub;

    /**
     * @var \MageSuite\ContentConstructor\View\Template|\PHPUnit_Framework_MockObject_MockObject
     */
    private $templateStub;

    /**
     * @var \MageSuite\ContentConstructor\View\TemplateLocator|\PHPUnit_Framework_MockObject_MockObject
     */
    private $locatorStub;

    /**
     * @var \MageSuite\ContentConstructor\Components\ProductFinder\ProductFinder
     */
    private $custom;


    public function setUp()
    {
        $this->templateStub = $this->getMockBuilder(\MageSuite\ContentConstructor\View\Template::class)->getMock();
        $this->locatorStub = $this->getMockBuilder(\MageSuite\ContentConstructor\View\TemplateLocator::class)->getMock();
        $this->endpointUrlProviderStub = $this->getMockBuilder(\MageSuite\ContentConstructor\Components\ProductFinder\EndpointUrlProvider::class)->getMock();
        $this->mediaResolverStub = $this->getMockBuilder(\MageSuite\ContentConstructor\Service\MediaResolver::class)->getMock();

        $this->custom = new \MageSuite\ContentConstructor\Components\ProductFinder\ProductFinder(
            $this->templateStub,
            $this->locatorStub,
            $this->endpointUrlProviderStub,
            $this->mediaResolverStub
        );
    }

    public function testItImplementsComponentInterface() {
        $this->assertInstanceOf(\MageSuite\ContentConstructor\Component::class,$this->custom);
    }

    public function testItRendersTemplate()
    {
        $componentConfiguration = ['main' => 'test'];

        $this->locatorStub
            ->method('locate')
            ->willReturn('');

        $this->templateStub
            ->method('render')
            ->willReturn('some_value');

        $this->assertEquals(
            'some_value',
              $this->custom->render($componentConfiguration)
        );
    }
}