<?php

namespace MageSuite\ContentConstructor\Tests\Components\MagentoProductGridTeasers;

use MageSuite\ContentConstructor\Component;

class MagentoProductGridTeasers extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Twig_Environment|\PHPUnit_Framework_MockObject_MockObject
     */
    private $templateMock;

    /**
     * @var \MageSuite\ContentConstructor\View\AdminTemplateLocator|\PHPUnit_Framework_MockObject_MockObject
     */
    private $locatorMock;

    /**
     * @var \MageSuite\ContentConstructor\Components\Headline\HeadlineAdmin
     */
    private $magentoProductGridTeasers;


    public function setUp()
    {
        $this->templateMock = $this->getMockBuilder(\MageSuite\ContentConstructor\View\Template::class)->getMock();
        $this->locatorMock = $this->getMockBuilder(\MageSuite\ContentConstructor\View\TemplateLocator::class)->getMock();

        $this->magentoProductGridTeasers = new \MageSuite\ContentConstructor\Components\MagentoProductGridTeasers\MagentoProductGridTeasers(
            $this->templateMock,
            $this->locatorMock
        );
    }

    public function testItImplementsComponentInterface() {
        $this->assertInstanceOf(\MageSuite\ContentConstructor\Component::class,$this->magentoProductGridTeasers);
    }
}
