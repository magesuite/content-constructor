<?php

namespace MageSuite\ContentConstructor\Components\Paragraph;

class ParagraphAdmin extends \MageSuite\ContentConstructor\AbstractAdminComponent
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
     * @var WysiwygConfigDataProvider
     */
    private $wysiwygConfigDataProvider;

    public function __construct(
        \MageSuite\ContentConstructor\View\Template $template,
        \MageSuite\ContentConstructor\View\AdminTemplateLocator $locator,
        WysiwygConfigDataProvider $wysiwygConfigDataProvider
    )
    {
        $this->template = $template;
        $this->locator = $locator;
        $this->wysiwygConfigDataProvider = $wysiwygConfigDataProvider;
    }

    public function renderConfigurator()
    {
        return $this->template->render(
            $this->locator->locate('customizations/m2c-paragraph-configurator/src/m2c-paragraph-configurator.twig'),
            [
                'configuration' => $this->getComponentConfiguration(),
                'wysiwyg_configuration' => $this->wysiwygConfigDataProvider->getConfig()
            ]
        );
    }

    public function renderPreview()
    {

    }
}