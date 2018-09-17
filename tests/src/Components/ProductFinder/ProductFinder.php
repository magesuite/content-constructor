<?php

namespace MageSuite\ContentConstructor\Components\ProductFinder;

use MageSuite\ContentConstructor\Component;

class ProductFinder extends \MageSuite\ContentConstructor\AbstractComponent implements Component
{
    /**
     * @var EndpointUrlProvider
     */
    protected $endpointUrlProvider;

    /**
     * @var \MageSuite\ContentConstructor\Service\MediaResolver
     */
    protected $mediaResolver;

    public function __construct(
        \MageSuite\ContentConstructor\View\Template $twig,
        \MageSuite\ContentConstructor\View\TemplateLocator $locator,
        \MageSuite\ContentConstructor\Components\ProductFinder\EndpointUrlProvider $endpointUrlProvider,
        \MageSuite\ContentConstructor\Service\MediaResolver $mediaResolver
    )
    {
        parent::__construct($twig, $locator);

        $this->endpointUrlProvider = $endpointUrlProvider;
        $this->mediaResolver = $mediaResolver;
    }

    public function render(array $configuration)
    {
        $configuration = $this->mediaResolver->resolveInArray($configuration);

        $configuration['endpointUrl'] = $this->endpointUrlProvider->getUrl();

        return $this->template->render(
            $this->locator->locate($this->getTemplatePath($configuration)),
            $configuration
        );
    }

    protected function getDefaultTemplatePath()
    {
        return 'product-finder/product-finder.twig';
    }
}
