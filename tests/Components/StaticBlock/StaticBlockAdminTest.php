<?php

namespace MageSuite\ContentConstructor\Tests\AdminComponents;

class StaticBlockTest extends \PHPUnit\Framework\TestCase
{
    private $blocks = [
        ['identifier' => 'first', 'title' => 'First'],
        ['identifier' => 'second', 'title' => 'Second']
    ];

    /**
     * @var \MageSuite\ContentConstructor\Components\StaticBlock\DataProvider|\PHPUnit_Framework_MockObject_MockObject
     */

    private $dataProviderMock;
    /**
     * @var \MageSuite\ContentConstructor\View\Template|\PHPUnit_Framework_MockObject_MockObject
     */
    private $templateMock;

    /**
     * @var \MageSuite\ContentConstructor\View\AdminTemplateLocator|\PHPUnit_Framework_MockObject_MockObject
     */
    private $locatorMock;

    /**
     * @var \MageSuite\ContentConstructor\Components\Headline\HeadlineAdmin
     */
    private $staticBlock;


    public function setUp(): void
    {
        $this->templateMock = $this->getMockBuilder(\MageSuite\ContentConstructor\View\Template::class)->getMock();
        $this->locatorMock = $this->getMockBuilder(\MageSuite\ContentConstructor\View\AdminTemplateLocator::class)->getMock();
        $this->dataProviderMock = $this->getMockBuilder(\MageSuite\ContentConstructor\Components\StaticBlock\DataProvider::class)->getMock();

        $this->staticBlock = new \MageSuite\ContentConstructor\Components\StaticBlock\StaticBlockAdmin(
            $this->templateMock,
            $this->locatorMock,
            $this->dataProviderMock
        );
    }

    public function testItImplementsAdminComponentInterface() {
        $this->assertInstanceOf(\MageSuite\ContentConstructor\AdminComponent::class,$this->staticBlock);
    }

    public function testItRendersCorrectTemplate()
    {
        $this->locatorMock
            ->method('locate')
            ->willReturn('location');

        $this->templateMock
            ->method('render')
            ->willReturn('rendered_configurator');

        $this->assertEquals(
            'rendered_configurator',
             $this->staticBlock->renderConfigurator()
        );
    }
}
