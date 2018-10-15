<?php

namespace MageSuite\ContentConstructor\Tests\Components\DailyDealTeaser;

class DailyDealTeaserAdminTest extends \PHPUnit\Framework\TestCase
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
     * @var \MageSuite\ContentConstructor\Components\DailyDealTeaser\DailyDealTeaserAdmin
     */
    private $cmsTeaserAdmin;

    /**
     * @var \MageSuite\ContentConstructor\Components\DailyDealTeaser\DailyDealTeaserAdminDataProvider
     */
    private $dailyDealTeaserAdminDataProvider;


    public function setUp()
    {
        $this->templateMock = $this->getMockBuilder(\MageSuite\ContentConstructor\View\Template::class)->getMock();
        $this->locatorMock = $this->getMockBuilder(\MageSuite\ContentConstructor\View\AdminTemplateLocator::class)->getMock();
        $this->dailyDealTeaserAdminDataProvider = $this->getMockBuilder(\MageSuite\ContentConstructor\Components\DailyDealTeaser\DailyDealTeaserAdminDataProvider::class)->getMock();

        $this->cmsTeaserAdmin = new \MageSuite\ContentConstructor\Components\DailyDealTeaser\DailyDealTeaserAdmin(
            $this->templateMock,
            $this->locatorMock,
            $this->dailyDealTeaserAdminDataProvider
        );
    }

    public function testItImplementsAdminComponentInterface() {
        $this->assertInstanceOf(\MageSuite\ContentConstructor\AdminComponent::class,$this->cmsTeaserAdmin);
    }

    public function testItRendersCorrectTemplate()
    {
        $this->locatorMock
            ->method('locate')
            ->willReturn('/configurator.twig');

        $this->templateMock
            ->method('render')
            ->willReturn('rendered_template');


        $this->assertEquals(
            'rendered_template',
            $this->cmsTeaserAdmin->renderConfigurator()
        );
    }
}