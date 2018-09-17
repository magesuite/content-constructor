<?php

namespace MageSuite\ContentConstructor\Components\ProductFinder;

interface EndpointUrlProvider
{
    /**
     * Returns URL for endpoint that will redirect user to category with applied filters
     * @return string
     */
    public function getUrl();
}