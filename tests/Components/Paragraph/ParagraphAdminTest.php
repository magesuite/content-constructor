<?php

namespace MageSuite\ContentConstructor\Tests\Components\Paragraph;

class ParagraphAdminTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \MageSuite\ContentConstructor\Components\Paragraph\WysiwygConfigDataProvider
     */
    protected $wysiwygConfigDataProviderStub;

    /**
     * @var \Twig_Environment|\PHPUnit_Framework_MockObject_MockObject
     */
    private $templateMock;

    /**
     * @var \MageSuite\ContentConstructor\View\AdminTemplateLocator|\PHPUnit_Framework_MockObject_MockObject
     */
    private $locatorMock;

    /**
     * @var \MageSuite\ContentConstructor\Components\Paragraph\ParagraphAdmin
     */
    private $paragraph;

    public function setUp()
    {
        $this->templateMock = $this->getMockBuilder(\MageSuite\ContentConstructor\View\Template::class)->getMock();
        $this->locatorMock = $this->getMockBuilder(\MageSuite\ContentConstructor\View\AdminTemplateLocator::class)->getMock();
        $this->wysiwygConfigDataProviderStub = $this->getMockBuilder(\MageSuite\ContentConstructor\Components\Paragraph\WysiwygConfigDataProvider::class)->getMock();

        $this->paragraph = new \MageSuite\ContentConstructor\Components\Paragraph\ParagraphAdmin(
            $this->templateMock,
            $this->locatorMock,
            $this->wysiwygConfigDataProviderStub
        );
    }

    public function testItImplementsAdminComponentInterface() {
        $this->assertInstanceOf(\MageSuite\ContentConstructor\AdminComponent::class,$this->paragraph);
    }

    public function testItRendersCorrectTemplate()
    {
        $this->locatorMock
            ->method('locate')
            ->willReturn('/configurator.twig');

        $this->templateMock
            ->method('render')
            ->willReturn('rendered_template');

        $this->wysiwygConfigDataProviderStub
            ->method('getConfig')
            ->willReturn([]);

        $this->assertEquals(
            'rendered_template',
            $this->paragraph->renderConfigurator()
        );
    }
}