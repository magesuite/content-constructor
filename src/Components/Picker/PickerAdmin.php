<?php

namespace MageSuite\ContentConstructor\Components\Picker;

class PickerAdmin extends \MageSuite\ContentConstructor\AbstractAdminComponent
{
    protected $components = [
        ['type' => "headline", 'name' => "Headline", 'description' => "You can add headlines and subheadlines to your CMS page."],
        ['type' => "button", 'name' => "Button", 'description' => "You can place a button on your CMS page. Define the button text and the target link with this component."],
        ['type' => "paragraph", 'name' => "Paragraph", 'description' => "Choose this component if you want to include a text block to you CMS page."],
        ['type' => "static-cms-block", 'name' => "Static block", 'description' => "Choose this component to include an existing static block to your CMS page."],
        ['type' => "hero-carousel", 'name' => "Hero carousel", 'description' => "This component allows you to add several Hero images in a Slider. You can define Headlines, Subheadlines, Text and Buttons on each image."],
        ['type' => "image-teaser", 'name' => "Image teaser", 'description' => "This component allows you to add 1-6 image teasers with or without text in a row."],
        ['type' => "product-carousel", 'name' => "Product carousel", 'description' => "This carousel will display products from a specific category on your CMS page."],
        ['type' => "separator", 'name' => "Separator", 'description' => "This horizontal line is used to visualize separation of two components."],
        ['type' => "brand-carousel", 'name' => "Brand carousel", 'description' => "Highlight some brands and show them in a carousel by using this component."],
        ['type' => "category-links", 'name' => "Category links", 'description' => "Include category links with this component."],
        ['type' => "product-grid", 'name' => "Products grid", 'description' => "This component will display products grid from a specific category."],
        ['type' => "custom-html", 'name' => "Custom HTML", 'description' => "This component displays any custom HTML without formatting."],
        ['type' => "cms-teaser", 'name' => "CMS Pages Teaser", 'description' => "This component lists CMS pages by tag."],
        ['type' => "product-finder", 'name' => "Product Finder", 'description' => "Product Finder."],
        ['type' => "daily-deal-teaser", 'name' => "Daily Deal Teaser", 'description' => "Daily Deal Teaser."]
    ];

    /**
     * @var \MageSuite\ContentConstructor\View\Template
     */
    private $template;

    /**
     * @var \MageSuite\ContentConstructor\View\TemplateLocator
     */
    private $locator;
    /**
     * @var \MageSuite\ContentConstructor\ComponentSupport
     */
    private $componentSupport;

    public function __construct(
        \MageSuite\ContentConstructor\View\Template $template,
        \MageSuite\ContentConstructor\View\AdminTemplateLocator $locator,
        \MageSuite\ContentConstructor\ComponentSupport $componentSupport
    )
    {
        $this->template = $template;
        $this->locator = $locator;
        $this->componentSupport = $componentSupport;
    }

    public function getSupportedComponents() {
        $components = [];

        foreach($this->components as $component) {
            if(!$this->componentSupport->isSupported($component['type'])) {
                continue;
            }

            $components[] = $component;
        }
        return $components;
    }

    public function renderConfigurator()
    {
        return $this->template->render(
            $this->locator->locate('components/cc-component-picker/src/cc-component-picker.twig'),
            [
                'configuration' => $this->getComponentConfiguration(),
                'components' => json_encode($this->getSupportedComponents())
            ]
        );
    }

    public function renderPreview()
    {
    }
}
