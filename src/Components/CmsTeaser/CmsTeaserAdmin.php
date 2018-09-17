<?php

namespace MageSuite\ContentConstructor\Components\CmsTeaser;

class CmsTeaserAdmin extends \MageSuite\ContentConstructor\AbstractAdminComponent
{
    /**
     * @var \MageSuite\ContentConstructor\View\Template
     */
    private $template;

    /**
     * @var \MageSuite\ContentConstructor\View\AdminTemplateLocator
     */
    private $locator;
    /**
     * @var CmsTeaserAdminDataProvider
     */
    private $cmsTeaserAdminDataProvider;

    public function __construct(
        \MageSuite\ContentConstructor\View\Template $template,
        \MageSuite\ContentConstructor\View\AdminTemplateLocator $locator,
        \MageSuite\ContentConstructor\Components\CmsTeaser\CmsTeaserAdminDataProvider $cmsTeaserAdminDataProvider
    )
    {
        $this->template = $template;
        $this->locator = $locator;
        $this->cmsTeaserAdminDataProvider = $cmsTeaserAdminDataProvider;
    }

    public function renderConfigurator()
    {
        return $this->template->render(
            $this->locator->locate('customizations/m2c-cms-pages-teaser-configurator/src/m2c-cms-pages-teaser-configurator.twig'),
            [
                'configuration' => $this->getComponentConfiguration(),
                'cmsTags' => json_encode($this->cmsTeaserAdminDataProvider->getTags())
            ]
        );
    }

    public function renderPreview()
    {

    }
}