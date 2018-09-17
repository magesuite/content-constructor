<?php

namespace MageSuite\ContentConstructor\Factory;

interface AdminComponent
{
    /**
     * Sets current component configuration
     * @param array $configuration
     * @return $this
     */
    public function setComponentConfiguration(array $configuration);

    /**
     * Gets current component configuration
     * @return mixed
     */
    public function getComponentConfiguration();

    /**
     * Renders component configurator view
     * @return string
     */
    public function renderConfigurator();
    
    public function renderPreview();
}