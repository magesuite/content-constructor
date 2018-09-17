<?php

namespace MageSuite\ContentConstructor\Components\StaticBlock;

class StaticBlockAdmin extends \MageSuite\ContentConstructor\AbstractAdminComponent
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
     * @var DataProvider
     */
    private $dataProvider;

    public function __construct(
        \MageSuite\ContentConstructor\View\Template $template,
        \MageSuite\ContentConstructor\View\AdminTemplateLocator $locator,
        \MageSuite\ContentConstructor\Components\StaticBlock\DataProvider $dataProvider
    ) {
        $this->template = $template;
        $this->locator = $locator;
        $this->dataProvider = $dataProvider;
    }

    public function renderConfigurator()
    {
        return $this->template->render(
            $this->locator->locate('customizations/m2c-static-block-configurator/src/m2c-static-block-configurator.twig'),
            [
                'configuration' => $this->getComponentConfiguration(),
                'blocks' => $this->dataProvider->getBlocks()
            ]
        );
    }

    public function renderPreview()
    {
        
    }
}