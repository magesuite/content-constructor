<?php

namespace MageSuite\ContentConstructor\Components\ProductGrid;

class ProductGrid extends \MageSuite\ContentConstructor\AbstractComponent implements \MageSuite\ContentConstructor\Component
{
    /**
     * If limit is not passed from configurator then 24 products are returned so we can be sure that
     * biggest scenario (4 rows) can be filled with products
     */
    const DEFAULT_PRODUCTS_LIMIT = 24;

    /**
     * @var \MageSuite\ContentConstructor\Components\ProductCarousel\DataProvider
     */
    private $dataProvider;
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
        \MageSuite\ContentConstructor\Components\ProductCarousel\DataProvider $dataProvider,
        \MageSuite\ContentConstructor\Service\MediaResolver $mediaResolver,
        \MageSuite\ContentConstructor\Service\UrlResolver $urlResolver
    )
    {
        parent::__construct($template, $locator);

        $this->dataProvider = $dataProvider;
        $this->mediaResolver = $mediaResolver;
        $this->urlResolver = $urlResolver;
    }

    /**
     * Renders component with specified configuration
     * @param array $configuration
     * @return mixed
     */
    public function render(array $configuration)
    {
        $configuration['limit'] = (isset($configuration['limit']) and is_numeric($configuration['limit'])) ? (int)$configuration['limit'] : self::DEFAULT_PRODUCTS_LIMIT;

        $products = $this->dataProvider->getProducts($configuration);

        $identities = array_column($products, 'identities');
        $this->setIdentities($identities);

        $configuration['products'] = $products;

        if(isset($configuration['hero']['href']) and !empty($configuration['hero']['href'])) {
            $configuration['hero']['href'] = $this->urlResolver->resolve($configuration['hero']['href']);
        }

        if(!empty($configuration['hero']['decoded_image'])) {
            $configuration['hero']['image'] = [
                'src' => $this->mediaResolver->resolve($configuration['hero']['decoded_image']),
                'srcSet' => $this->mediaResolver->resolveSrcSet($configuration['hero']['decoded_image'])
            ];
        }

        return $this->template->render(
            $this->locator->locate($this->getTemplatePath($configuration)),
            $configuration
        );
    }

    protected function getDefaultTemplatePath()
    {
        return 'products-grid/products-grid.twig';
    }
}
