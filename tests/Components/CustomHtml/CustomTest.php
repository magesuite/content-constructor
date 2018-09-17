<?php

namespace MageSuite\ContentConstructor\Tests\Components\CustomHtml;

class CustomHtmlTest extends \PHPUnit\Framework\TestCase
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
     * @var \MageSuite\ContentConstructor\Components\CustomHtml\CustomHtml
     */
    private $custom;


    public function setUp()
    {
        $this->templateStub = $this->getMockBuilder(\MageSuite\ContentConstructor\View\Template::class)->getMock();
        $this->locatorStub = $this->getMockBuilder(\MageSuite\ContentConstructor\View\TemplateLocator::class)->getMock();

        $this->custom = new \MageSuite\ContentConstructor\Components\CustomHtml\CustomHtml(
            $this->templateStub,
            $this->locatorStub
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