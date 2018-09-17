<?php

namespace MageSuite\ContentConstructor\Components\MagentoProductGridTeasers;

use MageSuite\ContentConstructor\Component;

class MagentoProductGridTeasers extends \MageSuite\ContentConstructor\AbstractComponent implements Component
{
    public function render(array $configuration)
    {
        return $this->template->render(
            $this->locator->locate($this->getTemplatePath($configuration)),
            $configuration
        );
    }

    protected function getDefaultTemplatePath()
    {
        return 'magento-product-grid-teasers/magento-product-grid-teasers.twig';
    }
}
