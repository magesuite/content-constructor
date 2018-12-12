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


    public function __construct(
        \MageSuite\ContentConstructor\View\Template $template,
        \MageSuite\ContentConstructor\View\AdminTemplateLocator $locator
    )
    {
        $this->template = $template;
        $this->locator = $locator;

    }

    public function renderConfigurator()
    {
        return $this->template->render(
            $this->locator->locate('paragraph/configurator/paragraph.twig'),
            [
                'configuration' => $this->getComponentConfiguration(),
                'wysiwyg_configuration' => new \Magento\Cms\Model\WysiwygDefaultConfig()
            ]
        );
    }

    public function renderPreview()
    {

    }
}
