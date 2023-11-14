<?php

namespace MageSuite\ContentConstructor\Factory;

interface AdminComponentFactory
{
    /**
     * @param $componentName
     * @return \MageSuite\ContentConstructor\AdminComponent
     */
    public function create(string $componentName);
}
