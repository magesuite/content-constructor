<?php

namespace MageSuite\ContentConstructor\Tests\Components\Navigation;

class NavigationTest extends \PHPUnit\Framework\TestCase
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
     * @var \MageSuite\ContentConstructor\Components\Navigation\Navigation
     */
    private $navigation;

    /**
     * @var \MageSuite\ContentConstructor\Components\Navigation\DataProvider|\PHPUnit_Framework_MockObject_MockObject
     */
    private $dataProviderStub;


    public function setUp()
    {
        $this->templateStub = $this->getMockBuilder(\MageSuite\ContentConstructor\View\Template::class)->getMock();
        $this->locatorStub = $this->getMockBuilder(\MageSuite\ContentConstructor\View\TemplateLocator::class)->getMock();
        $this->dataProviderStub = $this->getMockBuilder(\MageSuite\ContentConstructor\Components\Navigation\DataProvider::class)->getMock();

        $this->navigation = new \MageSuite\ContentConstructor\Components\Navigation\Navigation(
            $this->templateStub,
            $this->locatorStub,
            $this->dataProviderStub
        );
    }

    public function testItImplementsComponentInterface()
    {
        $this->assertInstanceOf(\MageSuite\ContentConstructor\Component::class, $this->navigation);
    }

    public function testItRendersTemplate()
    {
        $componentConfiguration = ['root_category_id' => 2];

        $this->locatorStub
            ->method('locate')
            ->willReturn('');

        $this->templateStub
            ->method('render')
            ->willReturn('some_value');

        $this->dataProviderStub
            ->method('getNavigationStructure')
            ->willReturn(['items' => []]);

        $this->assertEquals(
            'some_value',
            $this->navigation->render($componentConfiguration)
        );
    }

    public function testItRendersTemplateWithoutRootCategory()
    {
        $componentConfiguration = [];

        $this->locatorStub
            ->method('locate')
            ->willReturn('');

        $this->templateStub
            ->method('render')
            ->willReturn('some_value');

        $this->dataProviderStub
            ->method('getNavigationStructure')
            ->willReturn(['items' => []]);

        $this->assertEquals(
            'some_value',
            $this->navigation->render($componentConfiguration)
        );
    }
}