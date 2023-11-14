<?php

namespace MageSuite\ContentConstructor\Tests\Components\CmsTeaser;

class CmsTeaserAdminTest extends \PHPUnit\Framework\TestCase
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
     * @var \MageSuite\ContentConstructor\Components\CmsTeaser\CmsTeaserAdmin
     */
    private $cmsTeaserAdmin;

    /**
     * @var \MageSuite\ContentConstructor\Components\CmsTeaser\CmsTeaserAdminDataProvider
     */
    private $cmsTeaserAdminDataProvider;


    public function setUp()
    {
        $this->templateMock = $this->getMockBuilder(\MageSuite\ContentConstructor\View\Template::class)->getMock();
        $this->locatorMock = $this->getMockBuilder(\MageSuite\ContentConstructor\View\AdminTemplateLocator::class)->getMock();
        $this->cmsTeaserAdminDataProvider = $this->getMockBuilder(\MageSuite\ContentConstructor\Components\CmsTeaser\CmsTeaserAdminDataProvider::class)->getMock();

        $this->cmsTeaserAdmin = new \MageSuite\ContentConstructor\Components\CmsTeaser\CmsTeaserAdmin(
            $this->templateMock,
            $this->locatorMock,
            $this->cmsTeaserAdminDataProvider
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
