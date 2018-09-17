<?php

namespace MageSuite\ContentConstructor\Tests\Components\ImageTeaser;

class ImageTeaserTest extends \PHPUnit\Framework\TestCase
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
     * @var \MageSuite\ContentConstructor\Components\ImageTeaser\ImageTeaser
     */
    private $imageTeaser;

    private $mediaResolverStub;

    private $urlResolverStub;


    public function setUp()
    {
        $this->templateStub = $this->getMockBuilder(\MageSuite\ContentConstructor\View\Template::class)->getMock();
        $this->locatorStub = $this->getMockBuilder(\MageSuite\ContentConstructor\View\TemplateLocator::class)->getMock();
        $this->mediaResolverStub = $this->getMockBuilder(\MageSuite\ContentConstructor\Service\MediaResolver::class)->getMock();
        $this->urlResolverStub = $this->getMockBuilder(\MageSuite\ContentConstructor\Service\UrlResolver::class)->getMock();

        $this->imageTeaser = new \MageSuite\ContentConstructor\Components\ImageTeaser\ImageTeaser(
            $this->templateStub,
            $this->locatorStub,
            $this->mediaResolverStub,
            $this->urlResolverStub
        );
    }

    public function testItImplementsComponentInterface()
    {
        $this->assertInstanceOf(\MageSuite\ContentConstructor\Component::class, $this->imageTeaser);
    }

    public function testItRendersTemplate()
    {
        $componentConfiguration = [];

        $this->locatorStub
            ->method('locate')
            ->willReturn('location');

        $this->templateStub
            ->method('render')
            ->willReturn('some_value');

        $this->assertEquals(
            'some_value',
            $this->imageTeaser->render($componentConfiguration)
        );
    }
}