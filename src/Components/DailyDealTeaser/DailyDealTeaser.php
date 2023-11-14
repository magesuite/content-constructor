<?php

namespace MageSuite\ContentConstructor\Components\DailyDealTeaser;

class DailyDealTeaser extends \MageSuite\ContentConstructor\AbstractComponent implements \MageSuite\ContentConstructor\Component
{
    /**
     * @var \MageSuite\ContentConstructor\Components\DailyDealTeaser\DataProvider
     */
    private $dataProvider;

    public function __construct(
        \MageSuite\ContentConstructor\View\Template $template,
        \MageSuite\ContentConstructor\View\TemplateLocator $locator,
        \MageSuite\ContentConstructor\Components\DailyDealTeaser\DataProvider $dataProvider
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
        $configuration['filter_attributes'] = [
            'daily_deal_enabled' => [
                'value' => 1,
                'operator' => 'eq'
            ]
        ];

        $product = $this->dataProvider->getProduct($configuration);

        $identities = $product && isset($product['identities']) ? $product['identities'] : [];
        $this->setIdentities($identities);

        $data = array_merge(
            $configuration,
            ['product' => $product]
        );

        return $this->template->render(
            $this->locator->locate($this->getTemplatePath($configuration)),
            $data
        );
    }

    protected function getDefaultTemplatePath()
    {
        return 'daily-deal-teaser/daily-deal-teaser.twig';
    }
}
