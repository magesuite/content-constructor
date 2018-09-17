<?php

namespace MageSuite\ContentConstructor\Components\Button;

use MageSuite\ContentConstructor\Component;

class Button extends \MageSuite\ContentConstructor\AbstractComponent implements Component
{
    /**
     * @var \MageSuite\ContentConstructor\Service\UrlResolver
     */
    private $urlResolver;
    /**
     * @var DataProvider
     */
    private $dataProvider;

    public function __construct(
        \MageSuite\ContentConstructor\View\Template $template,
        \MageSuite\ContentConstructor\View\TemplateLocator $locator,
        \MageSuite\ContentConstructor\Service\UrlResolver $urlResolver,
        DataProvider $dataProvider
    )
    {
        parent::__construct($template, $locator);

        $this->urlResolver = $urlResolver;
        $this->dataProvider = $dataProvider;
    }

    public function render(array $configuration)
    {
        $configuration = $this->dataProvider->addCategoryInformation($configuration);

        if(isset($configuration['target']) and !empty($configuration['target'])) {
            $configuration['target'] = $this->urlResolver->resolve($configuration['target']);
        }

        return $this->template->render(
            $this->locator->locate($this->getTemplatePath($configuration)),
            $configuration
        );
    }

    protected function getDefaultTemplatePath()
    {
        return 'button/button.twig';
    }
}
