<?php

namespace MageSuite\ContentConstructor\Tests\Components\MagentoProductGridTeasers;

class MagentoProductGridTeasersAdminTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Twig_Environment|\PHPUnit_Framework_MockObject_MockObject
     */
    private $templateMock;

    /**
     * @var \MageSuite\ContentConstructor\View\TemplateLocator|\PHPUnit_Framework_MockObject_MockObject
     */
    private $locatorMock;

    /**
     * @var \MageSuite\ContentConstructor\Components\MagentoProductGridTeasers\MagentoProductGridTeasersAdmin
     */
    private $magentoProductGridTeasers;


    public function setUp(): void
    {
        $this->templateMock = $this->getMockBuilder(\MageSuite\ContentConstructor\View\Template::class)->getMock();
        $this->locatorMock = $this->getMockBuilder(\MageSuite\ContentConstructor\View\AdminTemplateLocator::class)->getMock();

        $this->magentoProductGridTeasers = new \MageSuite\ContentConstructor\Components\MagentoProductGridTeasers\MagentoProductGridTeasersAdmin(
            $this->templateMock,
            $this->locatorMock
        );
    }

    public function testItImplementsAdminComponentInterface() {
        $this->assertInstanceOf(\MageSuite\ContentConstructor\AdminComponent::class,$this->magentoProductGridTeasers);
    }
}
