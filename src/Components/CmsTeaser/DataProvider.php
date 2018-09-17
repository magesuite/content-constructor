<?php

namespace MageSuite\ContentConstructor\Components\CmsTeaser;

interface DataProvider
{
    /**
     * Retreive all brands
     * @param array $configuration
     * @return mixed
     */
    public function getPages($configuration);
}