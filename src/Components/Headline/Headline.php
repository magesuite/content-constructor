<?php

namespace MageSuite\ContentConstructor\Components\Headline;

use MageSuite\ContentConstructor\Component;

class Headline extends \MageSuite\ContentConstructor\AbstractComponent implements Component
{
    public function render(array $configuration)
    {
        if(!isset($configuration['tag'])) {
            $configuration['tag'] = 'h1';
        }

        return $this->template->render(
            $this->locator->locate($this->getTemplatePath($configuration)),
            $configuration
        );
    }

    protected function getDefaultTemplatePath()
    {
        return 'headline/headline.twig';
    }
}
