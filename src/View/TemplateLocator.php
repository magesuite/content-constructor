<?php

namespace MageSuite\ContentConstructor\View;

interface TemplateLocator
{
    /**
     * Returns realpath for searched file
     * @param $path
     * @return string
     */
    public function locate($path);
}
