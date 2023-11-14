<?php

namespace MageSuite\ContentConstructor;

class ComponentManager
{
    /**
     * @var Factory\AdminComponentFactory
     */
    private $adminComponentFactory;

    /**
     * @var AdminComponent
     */
    private $adminComponent;

    public function __construct(
        \MageSuite\ContentConstructor\Factory\AdminComponentFactory $adminComponentFactory
    )
    {
        $this->adminComponentFactory = $adminComponentFactory;
    }

    /**
     * @param string $type
     * @return AdminComponent
     */
    public function initializeComponent(string $type)
    {
        $this->adminComponent = $this->adminComponentFactory->create($type);

        if($this->adminComponent == null) {
            throw new \InvalidArgumentException("Specified component does not exist");
        }

        return $this->adminComponent;
    }
}
