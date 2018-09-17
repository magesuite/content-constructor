<?php

namespace MageSuite\ContentConstructor\Components\Separator;

use MageSuite\ContentConstructor\Component;

class Separator extends \MageSuite\ContentConstructor\AbstractComponent implements Component
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
        return 'separator/separator.twig';
    }
}
