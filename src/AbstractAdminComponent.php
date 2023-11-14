<?php


namespace MageSuite\ContentConstructor;

abstract class AbstractAdminComponent implements AdminComponent
{
    /**
     * @var array
     */
    protected $configuration = [];

    /**
     * @param array $configuration
     * @return $this
     */
    public function setComponentConfiguration(array $configuration)
    {
        $this->configuration = $configuration;

        return $this;
    }

    /**
     * Gets current component configuration
     * @return array
     */
    public function getComponentConfiguration()
    {
        return $this->configuration;
    }

    /**
     * Renders component configurator view
     * @return string
     */
    abstract public function renderConfigurator();
}
