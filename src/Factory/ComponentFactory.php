<?php

namespace MageSuite\ContentConstructor\Factory;

interface ComponentFactory
{
    /**
     * @param $componentName
     * @return \MageSuite\ContentConstructor\Component
     */
    public function create(string $componentName);
}
