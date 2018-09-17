<?php

namespace MageSuite\ContentConstructor\Components\Navigation;

class Navigation extends \MageSuite\ContentConstructor\AbstractComponent implements \MageSuite\ContentConstructor\Component
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
        $rootCategoryId = isset($configuration['root_category_id']) ? $configuration['root_category_id'] : null;

        $navigationStructure = $this->dataProvider->getNavigationStructure($rootCategoryId);

        return $this->template->render(
            $this->locator->locate($this->getTemplatePath($configuration)),
            $navigationStructure
        );
    }

    protected function getDefaultTemplatePath()
    {
        return 'navigation/navigation.twig';
    }
}