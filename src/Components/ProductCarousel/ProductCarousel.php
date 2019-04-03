<?php

namespace MageSuite\ContentConstructor\Components\ProductCarousel;

class ProductCarousel extends \MageSuite\ContentConstructor\AbstractComponent implements \MageSuite\ContentConstructor\Component
{
    /**
     * @var \MageSuite\ContentConstructor\Service\ProductTileRenderer
     */
    protected $productTileRenderer;
    /**
     * @var DataProvider
     */
    private $dataProvider;

    public function __construct(
        \MageSuite\ContentConstructor\View\Template $template,
        \MageSuite\ContentConstructor\View\TemplateLocator $locator,
        DataProvider $dataProvider,
        \MageSuite\ContentConstructor\Service\ProductTileRenderer $productTileRenderer
    )
    {
        parent::__construct($template, $locator);

        $this->dataProvider = $dataProvider;
        $this->productTileRenderer = $productTileRenderer;
    }

    /**
     * Renders component with specified configuration
     * @param array $configuration
     * @return mixed
     */
    public function render(array $configuration)
    {
        $products = $this->dataProvider->getProducts($configuration, true);

        $this->setIdentities($this->getProductsIdentities($products));

        $data = array_merge(
            $configuration,
            ['products' => $this->getRenderedProductTiles($products)]
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

    protected function getRenderedProductTiles($products) {
        $renderedProducts = [];

        /** @var \Magento\Catalog\Model\Product $product */
        foreach($products as $product) {
            $renderedProducts[] = $this->productTileRenderer->render($product, null);
        }

        return $renderedProducts;
    }

    /**
     * @param $products
     * @return array
     */
    protected function getProductsIdentities($products)
    {
        $identities = [];

        /** @var \Magento\Catalog\Model\Product $product */
        foreach ($products as $product) {
            $identities = array_merge($identities, $product->getIdentities());
        }

        return $identities;
    }
}
