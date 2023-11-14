<?php

namespace MageSuite\ContentConstructor;

/**
 * Interface returns information if the component is supported in project
 * @package MageSuite\ContentConstructor
 */
interface ComponentSupport
{
    /**
     * @param string $component component type identifier
     * @return bool
     */
    public function isSupported($component);
}
