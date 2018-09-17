<?php

namespace MageSuite\ContentConstructor\Service;

interface UrlResolver
{
    /**
     * Returns full URL of resource
     * @param $resourceIdentifier string Representation of url in the system
     * @return mixed
     */
    public function resolve(string $resourceIdentifier);
}