<?php

namespace MageSuite\ContentConstructor\Tests\Components\Picker;

class PickerAdminTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \MageSuite\ContentConstructor\ComponentSupport|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $componentSupport;

    /**
     * @var \MageSuite\ContentConstructor\View\Template|\PHPUnit_Framework_MockObject_MockObject
     */
    private $templateStub;

    /**
     * @var \MageSuite\ContentConstructor\View\AdminTemplateLocator|\PHPUnit_Framework_MockObject_MockObject
     */
    private $locatorStub;

    /**
     * @var \MageSuite\ContentConstructor\Components\Picker\PickerAdmin
     */
    private $pickerAdmin;


    public function setUp()
    {
        $this->templateStub = $this->getMockBuilder(\MageSuite\ContentConstructor\View\Template::class)->getMock();
        $this->locatorStub = $this->getMockBuilder(\MageSuite\ContentConstructor\View\AdminTemplateLocator::class)->getMock();
        $this->componentSupport = $this->getMockBuilder(\MageSuite\ContentConstructor\ComponentSupport::class)->getMock();

        $this->pickerAdmin = new \MageSuite\ContentConstructor\Components\Picker\PickerAdmin(
            $this->templateStub,
            $this->locatorStub,
            $this->componentSupport
        );
    }

    public function testItReturnsOnlySupportedComponents() {
        $this->componentSupport->expects($this->at(0))
            ->method('isSupported')
            ->with('headline')
            ->willReturn(true);

        $this->componentSupport->expects($this->at(1))
            ->method('isSupported')
            ->with('button')
            ->willReturn(true);

        $result = $this->pickerAdmin->getSupportedComponents();

        $this->assertCount(2, $result);

        $this->assertEquals('headline', $result[0]['type']);
        $this->assertEquals('button', $result[1]['type']);
    }

    public function testItImplementsAdminComponentInterface()
    {
        $this->assertInstanceOf(\MageSuite\ContentConstructor\AdminComponent::class, $this->pickerAdmin);
    }

    public function testItRendersTemplate()
    {
        $this->locatorStub
            ->method('locate')
            ->willReturn('');

        $this->templateStub
            ->method('render')
            ->willReturn('some_value');

        $this->assertEquals(
            'some_value',
            $this->pickerAdmin->renderConfigurator()
        );
    }
}
