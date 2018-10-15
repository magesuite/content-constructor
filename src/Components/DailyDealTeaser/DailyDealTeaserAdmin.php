<?php

namespace MageSuite\ContentConstructor\Components\DailyDealTeaser;

class DailyDealTeaserAdmin extends \MageSuite\ContentConstructor\AbstractAdminComponent
{
    /**
     * @var \MageSuite\ContentConstructor\View\Template
     */
    private $template;

    /**
     * @var \MageSuite\ContentConstructor\View\AdminTemplateLocator
     */
    private $locator;

    public function __construct(
        \MageSuite\ContentConstructor\View\Template $template,
        \MageSuite\ContentConstructor\View\AdminTemplateLocator $locator
    )
    {
        $this->template = $template;
        $this->locator = $locator;
    }

    public function renderConfigurator()
    {
        return $this->template->render(
            $this->locator->locate('customizations/m2c-daily-deal-teaser-configurator/src/m2c-daily-deal-teaser-configurator.twig'),
            [
                'configuration' => $this->getComponentConfiguration()
            ]
        );
    }

    public function renderPreview()
    {

    }
}