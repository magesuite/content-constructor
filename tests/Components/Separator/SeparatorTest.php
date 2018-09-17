<?php

namespace MageSuite\ContentConstructor\Tests\Components\Separator;

class SeparatorTest extends \PHPUnit\Framework\TestCase
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
     * @var \MageSuite\ContentConstructor\Components\Separator\Separator
     */
    private $separator;


    public function setUp()
    {
        $this->templateStub = $this->getMockBuilder(\MageSuite\ContentConstructor\View\Template::class)->getMock();
        $this->locatorStub = $this->getMockBuilder(\MageSuite\ContentConstructor\View\TemplateLocator::class)->getMock();

        $this->separator = new \MageSuite\ContentConstructor\Components\Separator\Separator(
            $this->templateStub,
            $this->locatorStub
        );
    }

    public function testItImplementsComponentInterface() {
        $this->assertInstanceOf(\MageSuite\ContentConstructor\Component::class,$this->separator);
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

        $this->assertEquals(
            'some_value',
              $this->separator->render($componentConfiguration)
        );
    }
}