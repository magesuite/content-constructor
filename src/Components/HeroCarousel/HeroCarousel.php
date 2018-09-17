<?php

namespace MageSuite\ContentConstructor\Components\HeroCarousel;

use MageSuite\ContentConstructor\Component;

class HeroCarousel extends \MageSuite\ContentConstructor\AbstractComponent implements Component
{
    /**
     * @var \MageSuite\ContentConstructor\Service\MediaResolver
     */
    private $mediaResolver;

    /**
     * @var \MageSuite\ContentConstructor\Service\UrlResolver
     */
    private $urlResolver;

    public function __construct(
        \MageSuite\ContentConstructor\View\Template $template,
        \MageSuite\ContentConstructor\View\TemplateLocator $locator,
        \MageSuite\ContentConstructor\Service\MediaResolver $mediaResolver,
        \MageSuite\ContentConstructor\Service\UrlResolver $urlResolver
    )
    {
        parent::__construct($template, $locator);

        $this->mediaResolver = $mediaResolver;
        $this->urlResolver = $urlResolver;
    }

    public function render(array $configuration)
    {
        $configuration = $this->resolveExternalResources($configuration);

        return $this->template->render(
            $this->locator->locate($this->getTemplatePath($configuration)),
            $configuration
        );
    }

    private function resolveExternalResources($configuration)
    {
        if(!isset($configuration['items'])) {
            return $configuration;
        }

        foreach($configuration['items'] as &$item) {
            if(!empty($item['decodedImage'])) {
                $item['image'] = [
                    'src' => $this->mediaResolver->resolve($item['decodedImage']),
                    'srcSet' => $this->mediaResolver->resolveSrcSet($item['decodedImage']),
                ];
            }

            if(!empty($item['href'])) {
                $item['href'] = $this->urlResolver->resolve($item['href']);
            }
        }

        return $configuration;
    }

    protected function getDefaultTemplatePath()
    {
        return 'hero/hero.twig';
    }
}
