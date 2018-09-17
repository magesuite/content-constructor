<?php

namespace MageSuite\ContentConstructor\Components\ProductCarousel;

class ProductCarousel extends \MageSuite\ContentConstructor\AbstractComponent implements \MageSuite\ContentConstructor\Component
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
     * @return mixed
     */
    public function render(array $configuration)
    {
        $products = $this->dataProvider->getProducts($configuration);

        $identities = $products ? array_column($products, 'identities') : [];
        $this->setIdentities($identities);

        $data = array_merge(
            $configuration,
            ['products' => $products]
        );

        return $this->template->render(
            $this->locator->locate($this->getTemplatePath($configuration)),
            $data
        );
    }

    protected function getDefaultTemplatePath()
    {
        return 'products-promo/products-promo.twig';
    }
}
