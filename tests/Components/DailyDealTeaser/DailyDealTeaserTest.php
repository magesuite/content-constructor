<?php

namespace MageSuite\ContentConstructor\Tests\Components\DailyDealTeaser;

class DailyDealTeaserTest extends \PHPUnit\Framework\TestCase
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
     * @var \MageSuite\ContentConstructor\Components\DailyDealTeaser\DailyDealTeaser
     */
    protected $dailyDealTeaser;

    public function setUp()
    {
        $this->templateStub = $this->getMockBuilder(\MageSuite\ContentConstructor\View\Template::class)->getMock();
        $this->locatorStub = $this->getMockBuilder(\MageSuite\ContentConstructor\View\TemplateLocator::class)->getMock();
        $this->dataProviderStub = $this->getMockBuilder(\MageSuite\ContentConstructor\Components\DailyDealTeaser\DataProvider::class)->getMock();

        $this->dailyDealTeaser = new \MageSuite\ContentConstructor\Components\DailyDealTeaser\DailyDealTeaser(
            $this->templateStub,
            $this->locatorStub,
            $this->dataProviderStub
        );
    }

    public function testItImplementsComponentInterface() {
        $this->assertInstanceOf(\MageSuite\ContentConstructor\Component::class, $this->dailyDealTeaser);
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
            ->method('getProduct')
            ->willReturn([]);

        $this->assertEquals(
            'some_value',
              $this->dailyDealTeaser->render($componentConfiguration)
        );
    }
}