<?php

namespace MageSuite\ContentConstructor\Components\BrandCarousel;

class BrandCarousel extends \MageSuite\ContentConstructor\AbstractComponent implements \MageSuite\ContentConstructor\Component
{
    /**
     * @var DataProvider
     */
    private $dataProvider;

    public function __construct(
        \MageSuite\ContentConstructor\View\Template $template,
        \MageSuite\ContentConstructor\View\TemplateLocator $locator,
        DataProvider $dataProvider
    )
    {
        parent::__construct($template, $locator);
        $this->dataProvider = $dataProvider;
    }

    /**
     * Renders component with specified configuration
     * @param array $configuration
     * @return string
     */
    public function render(array $configuration)
    {
        $data = array_merge(
            $configuration,
            ['brands' => $this->dataProvider->getBrands()]
        );

        return $this->template->render(
            $this->locator->locate($this->getTemplatePath($configuration)),
            $data
        );
    }

    protected function getDefaultTemplatePath()
    {
        return 'brand-carousel/brand-carousel.twig';
    }
}