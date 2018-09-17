<?php

namespace MageSuite\ContentConstructor\Components\CustomHtml;

use MageSuite\ContentConstructor\Component;

class CustomHtml extends \MageSuite\ContentConstructor\AbstractComponent implements Component
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
        return 'custom-html/custom-html.twig';
    }
}
