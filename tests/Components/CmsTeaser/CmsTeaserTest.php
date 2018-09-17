<?php

namespace MageSuite\ContentConstructor\Tests\Components\CmsTeaser;

class CmsTeaserTest extends \PHPUnit\Framework\TestCase
{
    protected $dataProviderStub;

    /**
     * @var \MageSuite\ContentConstructor\View\Template|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $templateStub;

    /**
     * @var \MageSuite\ContentConstructor\View\TemplateLocator|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $locatorStub;

    /**
     * @var \MageSuite\ContentConstructor\Components\CmsTeaser\CmsTeaser
     */
    protected $cmsTeaser;

    public function setUp()
    {
        $this->templateStub = $this->getMockBuilder(\MageSuite\ContentConstructor\View\Template::class)->getMock();
        $this->locatorStub = $this->getMockBuilder(\MageSuite\ContentConstructor\View\TemplateLocator::class)->getMock();
        $this->dataProviderStub = $this->getMockBuilder(\MageSuite\ContentConstructor\Components\CmsTeaser\DataProvider::class)->getMock();

        $this->cmsTeaser = new \MageSuite\ContentConstructor\Components\CmsTeaser\CmsTeaser(
            $this->templateStub,
            $this->locatorStub,
            $this->dataProviderStub
        );
    }

    public function testItImplementsComponentInterface() {
        $this->assertInstanceOf(\MageSuite\ContentConstructor\Component::class, $this->cmsTeaser);
    }

    public function testItRendersTemplate()
    {
        $componentConfiguration = [];

        $this->locatorStub
            ->method('locate')
            ->willReturn('');

        $this->templateStub
            ->method('render')
            ->willReturn('some_value');

        $this->dataProviderStub
            ->method('getPages')
            ->willReturn([]);

        $this->assertEquals(
            'some_value',
              $this->cmsTeaser->render($componentConfiguration)
        );
    }
}