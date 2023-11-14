<?php

namespace MageSuite\ContentConstructor;

abstract class AbstractComponent
{
    private $identities = [];

    /**
     * @var \MageSuite\ContentConstructor\View\Template
     */
    protected $template;

    /**
     * @var \MageSuite\ContentConstructor\View\TemplateLocator
     */
    protected $locator;

    public function __construct(
        \MageSuite\ContentConstructor\View\Template $twig,
        \MageSuite\ContentConstructor\View\TemplateLocator $locator
    )
    {
        $this->template = $twig;
        $this->locator = $locator;
    }

    public function getTemplatePath($configuration) {
        if(isset($configuration['template'])) {
            return $configuration['template'];
        }

        return $this->getDefaultTemplatePath();
    }

    public function setIdentities($identities)
    {
        $this->identities = $identities;
    }

    public function getIdentities()
    {
        return $this->identities;
    }

    abstract protected function getDefaultTemplatePath();
}
