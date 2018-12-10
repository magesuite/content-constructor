<?php

namespace MageSuite\ContentConstructor\Components\ProductCarousel;

class ProductCarouselAdmin extends \MageSuite\ContentConstructor\AbstractAdminComponent
{
    /**
     * @var \MageSuite\ContentConstructor\View\Template
     */
    private $template;

    /**
     * @var \MageSuite\ContentConstructor\View\AdminTemplateLocator
     */
    private $locator;

    /**
     * @var CategoryPickerProvider
     */
    private $categoryPickerProvider;

    public function __construct(
        \MageSuite\ContentConstructor\View\Template $template,
        \MageSuite\ContentConstructor\View\AdminTemplateLocator $locator,
        CategoryPickerProvider $categoryPickerProvider
    ) {
        $this->template = $template;
        $this->locator = $locator;
        $this->categoryPickerProvider = $categoryPickerProvider;
    }

    public function renderConfigurator()
    {
        return $this->template->render(
            $this->locator->locate('product-carousel/configurator/product-carousel.twig'),
            [
                'category_picker' => $this->categoryPickerProvider->renderPicker(),
                'configuration' => $this->getComponentConfiguration()
            ]
        );
    }

    public function renderPreview()
    {
        
    }
}
