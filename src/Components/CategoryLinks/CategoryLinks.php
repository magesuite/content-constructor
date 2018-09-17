<?php

namespace MageSuite\ContentConstructor\Components\CategoryLinks;

class CategoryLinks extends \MageSuite\ContentConstructor\AbstractComponent implements \MageSuite\ContentConstructor\Component
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
        try {
            $configuration['categories'] = $this->dataProvider->getCategories(
                $configuration['main_category_id'],
                explode(',', $configuration['sub_categories_ids'])
            );

            return $this->template->render(
                $this->locator->locate($this->getTemplatePath($configuration)),
                $configuration
            );
        }
        catch(\Exception $e) {
            return '';
        }
    }

    protected function getDefaultTemplatePath()
    {
        return 'category-links/category-links.twig';
    }
}