<?php

namespace MageSuite\ContentConstructor\Service;

interface ProductTileRenderer
{
    public function render(\Magento\Catalog\Api\Data\ProductInterface $product, $iterator);
}