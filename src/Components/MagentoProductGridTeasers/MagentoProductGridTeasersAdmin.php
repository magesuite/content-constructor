<?php

namespace MageSuite\ContentConstructor\Components\MagentoProductGridTeasers;

class MagentoProductGridTeasersAdmin extends \MageSuite\ContentConstructor\AbstractAdminComponent
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
    ) {
        $this->template = $template;
        $this->locator = $locator;
    }

    public function renderConfigurator()
    {
        return $this->template->render(
            $this->locator->locate('magento-product-grid-teasers/configurator/magento-product-grid-teasers.twig'),
            [
                'configuration' => $this->getComponentConfiguration(),
            ]
        );
    }

    public function renderPreview()
    {
    }
}
