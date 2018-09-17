<?php

namespace MageSuite\ContentConstructor\Tests\Components\Button;

class ButtonTest extends \PHPUnit\Framework\TestCase
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
     * @var \MageSuite\ContentConstructor\Components\Button\Button
     */
    protected $button;


    public function setUp()
    {
        $this->templateStub = $this->getMockBuilder(\MageSuite\ContentConstructor\View\Template::class)->getMock();
        $this->locatorStub = $this->getMockBuilder(\MageSuite\ContentConstructor\View\TemplateLocator::class)->getMock();
        $this->urlResolverStub = $this->getMockBuilder(\MageSuite\ContentConstructor\Service\UrlResolver::class)->getMock();
        $this->dataProviderStub = $this->getMockBuilder(\MageSuite\ContentConstructor\Components\Button\DataProvider::class)->getMock();

        $this->button = new \MageSuite\ContentConstructor\Components\Button\Button(
            $this->templateStub,
            $this->locatorStub,
            $this->urlResolverStub,
            $this->dataProviderStub
        );
    }

    public function testItImplementsComponentInterface()
    {
        $this->assertInstanceOf(\MageSuite\ContentConstructor\Component::class, $this->button);
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

        $this->dataProviderStub
            ->method('addCategoryInformation')
            ->willReturn($componentConfiguration);

        $this->assertEquals(
            'some_value',
            $this->button->render($componentConfiguration)
        );
    }
}